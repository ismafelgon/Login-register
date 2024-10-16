# Importar las librerías necesarias
from nba_api.stats.static import players
from nba_api.stats.endpoints import playergamelog
import mysql.connector
import time  # Importar para gestionar los reintentos y retrasos
from nba_api.stats.library.parameters import SeasonAll

# Configuraciones de la base de datos
db_config = {
    'host': "localhost",
    'user': "root",
    'password': "",
    'database': "login_register_db"
}

# Función para obtener el ID del jugador
def obtener_player_id(nombre_jugador):
    nba_players = players.get_players()
    for jugador in nba_players:
        if jugador['full_name'].lower() == nombre_jugador.lower():
            return jugador['id']
    print(f'Error: No se encontró el jugador con el nombre {nombre_jugador}.')
    return None

# Función para obtener el equipo contrincante en el próximo partido
def obtener_equipo_contrincante(df):
    matchup = df['MATCHUP']
    
    # Verificar si el equipo jugaba en casa o fuera
    if " vs. " in matchup:
        equipo_contrincante = matchup.split(" vs. ")[1]  # Equipo visitante si jugaba de local
    elif " @ " in matchup:
        equipo_contrincante = matchup.split(" @ ")[1]  # Equipo local si jugaba de visitante
    else:
        print(f"No se pudo extraer el equipo contrincante del matchup: {matchup}")
        equipo_contrincante = None

    return equipo_contrincante

# Función para obtener el equipo contrincante actual almacenado en la base de datos
def obtener_equipo_contrincante_actual(cursor, id_jugador):
    sql_select = "SELECT contrincante FROM jugadores WHERE id = %s"
    cursor.execute(sql_select, (id_jugador,))
    result = cursor.fetchone()
    if result:
        return result[0]  # Retorna el equipo contrincante actual
    return None

# Función para obtener el último ID procesado desde la tabla 'progreso'
def obtener_ultimo_procesado(cursor):
    cursor.execute("SELECT ultimo_id FROM progreso WHERE id = 1")
    result = cursor.fetchone()
    return result[0] if result else 0  # Retorna 0 si no hay registros

# Función para actualizar el último ID procesado en la tabla 'progreso'
def actualizar_progreso(cursor, ultimo_id):
    cursor.execute("UPDATE progreso SET ultimo_id = %s WHERE id = 1", (ultimo_id,))

# Función principal para actualizar el equipo contrincante
def actualizar_equipo_contrincante():
    # Conectar a la base de datos
    conexion = mysql.connector.connect(**db_config)
    cursor = conexion.cursor()

    # Obtener el último jugador procesado
    ultimo_procesado = obtener_ultimo_procesado(cursor)

    # Consultar todos los jugadores de la tabla 'jugadores'
    cursor.execute("SELECT id, nombreCompleto FROM jugadores WHERE id > %s ORDER BY id ASC", (ultimo_procesado,))
    jugadores = cursor.fetchall()

    # Recorrer cada jugador
    for jugador in jugadores:
        id_jugador = jugador[0]
        nombre_jugador = jugador[1]

        try:
            # Obtener ID del jugador en la API de NBA
            player_id = obtener_player_id(nombre_jugador)
            if player_id:
                # Obtener datos del último partido del jugador
                juego_log = playergamelog.PlayerGameLog(player_id=player_id, season='2024-25')
                df = juego_log.get_data_frames()[0]

                if not df.empty:
                    df_ultimo_partido = df.iloc[0]
                    nuevo_contrincante = obtener_equipo_contrincante(df_ultimo_partido)  # Obtener el equipo contrincante

                    if nuevo_contrincante:  # Verificar que el equipo contrincante no sea None
                        # Obtener el equipo contrincante actual almacenado en la base de datos
                        contrincante_actual = obtener_equipo_contrincante_actual(cursor, id_jugador)

                        # Solo actualizar si es distinto
                        if contrincante_actual != nuevo_contrincante:
                            sql_update = "UPDATE jugadores SET contrincante = %s WHERE id = %s"
                            cursor.execute(sql_update, (nuevo_contrincante, id_jugador))
                            print(f'Actualizado: {nombre_jugador} con nuevo contrincante {nuevo_contrincante}.')
                        else:
                            print(f'No se requiere actualización para {nombre_jugador}, el contrincante es el mismo.')
                    else:
                        print(f'No se pudo obtener el nuevo contrincante para {nombre_jugador}.')
                
                # Actualizar el progreso
                actualizar_progreso(cursor, id_jugador)
                conexion.commit()

        except Exception as e:
            print(f"Error al procesar {nombre_jugador}: {e}")
            print("Esperando 60 segundos antes de reintentar...")
            time.sleep(60)  # Espera 60 segundos antes de reintentar

    # Confirmar los cambios y cerrar la conexión
    conexion.commit()
    cursor.close()
    conexion.close()

# Ejecutar la función para actualizar el equipo contrincante
actualizar_equipo_contrincante()
