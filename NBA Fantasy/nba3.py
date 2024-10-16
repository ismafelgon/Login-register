# Importar las librerías necesarias
from nba_api.stats.static import teams
from nba_api.stats.endpoints import leaguegamefinder
import mysql.connector
import time
import logging
import requests  # Importar el módulo requests

# Configuraciones de la base de datos
db_config = {
    'host': "localhost",
    'user': "root",
    'password': "",
    'database': "login_register_db"
}

# Configurar logging para registrar errores
logging.basicConfig(filename='error.log', level=logging.ERROR)

# Caché para almacenar temporalmente los resultados de los próximos partidos
cache = {}

# Función para obtener el ID del equipo por coincidencia parcial de nombre
def obtener_team_id(nombre_equipo):
    nba_teams = teams.get_teams()
    for team in nba_teams:
        if nombre_equipo.lower() in team['full_name'].lower():  # Verificamos si una parte del nombre está contenida
            return team['id']
    print(f'Error: No se encontró el equipo con el nombre {nombre_equipo}.')
    return None

# Función para obtener el próximo contrincante del equipo, con reintentos y caché
def obtener_proximo_contrincante_equipo(id_equipo, reintentos=3):
    # Verificar si el equipo ya está en el caché
    if id_equipo in cache:
        return cache[id_equipo]

    for intento in range(reintentos):
        try:
            # Usar la API para buscar el próximo partido del equipo
            gamefinder = leaguegamefinder.LeagueGameFinder(
                team_id_nullable=id_equipo,
                season_nullable='2024-25',  # Cambiar aquí a '2024-25'
                timeout=30
            )
            df = gamefinder.get_data_frames()[0]

            if not df.empty:
                # El primer partido será el próximo
                proximo_partido = df.iloc[0]
                matchup = proximo_partido['MATCHUP']
                fecha_partido = proximo_partido['GAME_DATE']  # Extraer la fecha del partido

                # Determinar el contrincante basado en si el equipo juega en casa o fuera
                if " vs. " in matchup:
                    equipo_contrincante = matchup.split(" vs. ")[1]  # Juega de local
                elif " @ " in matchup:
                    equipo_contrincante = matchup.split(" @ ")[1]  # Juega de visitante
                else:
                    print(f"No se pudo extraer el equipo contrincante del matchup: {matchup}")
                    return None, None  # Retornar None para ambos si hay error

                # Guardar el resultado en el caché
                cache[id_equipo] = (equipo_contrincante, fecha_partido)
                return equipo_contrincante, fecha_partido

        except requests.exceptions.Timeout:
            print(f"Timeout en intento {intento+1}. Reintentando en 5 segundos...")
            time.sleep(5)  # Pausa antes de reintentar

        except Exception as e:
            logging.error(f"Error al obtener el contrincante del equipo {id_equipo}: {e}")
            print(f"Error en el intento {intento+1}: {e}")
            break

    return None, None  # Retornar None si no se encuentra el próximo partido

# Función principal para actualizar el próximo contrincante y la fecha en la tabla jugadores
def actualizar_proximo_partido_jugadores():
    # Conectar a la base de datos
    conexion = mysql.connector.connect(**db_config)
    cursor = conexion.cursor()

    # Consultar los equipos únicos de la tabla 'jugadores'
    cursor.execute("SELECT DISTINCT equipo FROM jugadores")
    equipos = cursor.fetchall()
    
    print(f"Equipos encontrados: {len(equipos)}")

    # Recorrer cada equipo
    for equipo in equipos:
        equipo_jugador = equipo[0]
        
        try:
            # Obtener ID del equipo en la API de NBA
            team_id = obtener_team_id(equipo_jugador)
            if team_id:
                # Obtener el próximo contrincante del equipo y la fecha del partido
                proximo_contrincante, fecha_partido = obtener_proximo_contrincante_equipo(team_id)

                if proximo_contrincante and fecha_partido:
                    # Actualizar la columna proximoPartido y fechaProximPartido para todos los jugadores de ese equipo
                    sql_update = "UPDATE jugadores SET proximoPartido = %s, fechaProximoPartido = %s WHERE equipo = %s"
                    cursor.execute(sql_update, (proximo_contrincante, fecha_partido, equipo_jugador))
                    print(f'Actualizado: Equipo {equipo_jugador} con próximo partido contra {proximo_contrincante} en la fecha {fecha_partido}.')
                else:
                    print(f'No se pudo obtener el próximo contrincante o la fecha para el equipo {equipo_jugador}.')
                
                # Confirmar los cambios
                conexion.commit()

        except Exception as e:
            logging.error(f"Error al procesar el equipo {equipo_jugador}: {e}")
            print(f"Error al procesar el equipo {equipo_jugador}: {e}")
            print("Esperando 60 segundos antes de reintentar...")
            time.sleep(60)  # Espera 60 segundos antes de reintentar

    # Cerrar la conexión a la base de datos
    cursor.close()
    conexion.close()

# Ejecutar la función para actualizar el próximo partido
actualizar_proximo_partido_jugadores()
