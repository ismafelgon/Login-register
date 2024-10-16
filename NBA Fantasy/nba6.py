import requests  # Asegúrate de tener esta librería para el manejo de timeout
from nba_api.stats.static import teams
from nba_api.stats.endpoints import teamgamelog
import mysql.connector
import time
import math

# Configuraciones de la base de datos
db_config = {
    'host': "localhost",
    'user': "root",
    'password': "",
    'database': "login_register_db"
}

# Función para obtener el ID del equipo por coincidencia parcial en el nombre o abreviatura
def obtener_team_id(nombre_equipo_parcial):
    nba_teams = teams.get_teams()
    for equipo in nba_teams:
        if (nombre_equipo_parcial.lower() in equipo['full_name'].lower() or
                nombre_equipo_parcial.upper() in equipo['abbreviation']):
            return equipo['id'], equipo['full_name']
    print(f'Error: No se encontró el equipo con el nombre parcial {nombre_equipo_parcial}.')
    return None, None

# Función para obtener los datos de los últimos partidos de varios equipos
def obtener_datos_ultimo_partido_equipo(team_ids, max_reintentos=3):
    datos_partidos = {}
    for team_id in team_ids:
        for intento in range(max_reintentos):
            try:
                juego_log = teamgamelog.TeamGameLog(team_id=team_id, season='2023-24', timeout=60)  # Aumentar el timeout
                df = juego_log.get_data_frames()[0]
                if not df.empty:
                    datos_partidos[team_id] = df.iloc[0]
                else:
                    print(f'No se encontraron datos de partidos para el equipo ID {team_id}.')
                break  # Salir del bucle si la llamada fue exitosa
            except requests.exceptions.Timeout:
                print(f"Timeout al obtener datos para el equipo ID {team_id}. Reintentando...")
                time.sleep(2 ** intento)  # Espera exponencial
            except Exception as e:
                print(f"Error al obtener datos del partido para el equipo ID {team_id}: {e}")
                break  # Romper el bucle en caso de otros errores
    return datos_partidos

# Función para verificar la fecha del último partido registrado en la base de datos
def obtener_fecha_ultimo_partido(cursor, id_jugador):
    sql_select = "SELECT fechaUltimoPartido FROM jugadores WHERE id = %s"
    cursor.execute(sql_select, (id_jugador,))
    result = cursor.fetchone()
    return result[0] if result else None

# Función para actualizar los puntos del jugador en la tabla usuarios
# Función para actualizar los puntos del jugador en la tabla usuarios
def actualizar_puntos_usuarios(cursor, nombre_jugador, diferencia_puntos):
    sql_select = "SELECT id, puntos FROM usuarios WHERE manager = %s"
    cursor.execute(sql_select, (nombre_jugador,))  # Asegúrate de pasar el nombre correcto aquí
    usuarios = cursor.fetchall()
    
    if not usuarios:
        print(f"No se encontraron usuarios para el manager: {nombre_jugador}")
    
    for usuario in usuarios:
        id_usuario, puntos_actuales = usuario
        nuevos_puntos = puntos_actuales + diferencia_puntos
        sql_update = "UPDATE usuarios SET puntos = %s WHERE id = %s"
        cursor.execute(sql_update, (nuevos_puntos, id_usuario))
        print(f"Puntos actualizados para el usuario {id_usuario} con {nuevos_puntos} puntos.")

# Función principal para actualizar las estadísticas del último partido de los jugadores con "HC"
def actualizar_puntos_ultimo_partido_equipo():
    conexion = mysql.connector.connect(**db_config)
    cursor = conexion.cursor()

    # Consultar todos los jugadores de la tabla 'jugadores' con "HC" en la columna 'posicion'
    cursor.execute("SELECT id, nombreCompleto, equipo, nombre FROM jugadores WHERE posicion = 'HC'")  # Asegúrate de seleccionar también la columna 'nombre'
    jugadores = cursor.fetchall()

    # Obtener los IDs de los equipos para hacer una sola llamada a la API
    team_ids = set()
    equipo_map = {}
    for jugador in jugadores:
        id_jugador, nombre_jugador_completo, nombre_equipo_parcial, nombre_jugador = jugador  # Agregar 'nombre'
        team_id, nombre_equipo_completo = obtener_team_id(nombre_equipo_parcial)
        if team_id:
            team_ids.add(team_id)
            equipo_map[id_jugador] = (team_id, nombre_equipo_completo)

    # Obtener datos de todos los últimos partidos de los equipos
    datos_partidos = obtener_datos_ultimo_partido_equipo(team_ids)

    # Recorrer cada jugador y actualizar puntos si es necesario
    for jugador in jugadores:
        id_jugador = jugador[0]
        nombre_jugador = jugador[3]  # Obtener el nombre del jugador
        if id_jugador in equipo_map:
            team_id, nombre_equipo_completo = equipo_map[id_jugador]
            if team_id in datos_partidos:
                df = datos_partidos[team_id]
                fecha_partido = df['GAME_DATE']
                fecha_ultimo_partido_bd = obtener_fecha_ultimo_partido(cursor, id_jugador)

                if fecha_ultimo_partido_bd is None or fecha_partido != fecha_ultimo_partido_bd:
                    puntos_equipo = int(df['PTS'])
                    matchup = df['MATCHUP'].split(' ')[2]
                    rival_team_id, _ = obtener_team_id(matchup)
                    if rival_team_id in datos_partidos:
                        rival_data = datos_partidos[rival_team_id]
                        puntos_rival = int(rival_data['PTS'])
                        diferencia_puntos = math.floor((puntos_equipo - puntos_rival) / 2)

                        if diferencia_puntos < 0:
                            diferencia_puntos = 0

                        # Actualizamos la tabla jugadores
                        sql_update = """
                        UPDATE jugadores 
                        SET puntosUltimoPartido = %s, puntos = puntos + %s, fechaUltimoPartido = %s 
                        WHERE id = %s
                        """
                        cursor.execute(sql_update, (diferencia_puntos, diferencia_puntos, fecha_partido, id_jugador))
                        print(f'Actualizado: {jugador[1]} con {diferencia_puntos} puntos y nueva fecha {fecha_partido}.')
                        # Actualizar los puntos en la tabla usuarios
                        actualizar_puntos_usuarios(cursor, nombre_jugador, diferencia_puntos)  # Cambia aquí
                    else:
                        print(f"No se encontraron datos para el equipo rival {matchup}.")
                else:
                    print(f'El partido ya ha sido registrado para {jugador[1]}, no se actualizan puntos.')

    # Confirmar los cambios y cerrar la conexión
    conexion.commit()
    cursor.close()
    conexion.close()

# Ejecutar la función para actualizar las estadísticas del último partido
actualizar_puntos_ultimo_partido_equipo()
