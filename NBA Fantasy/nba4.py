from nba_api.stats.endpoints import scoreboardv2
from nba_api.stats.static import teams
from datetime import datetime, timedelta
import pandas as pd
import mysql.connector
import time
import logging
import requests.exceptions

# Configuración de la base de datos
db_config = {
    'host': "localhost",
    'user': "root",  # Cambia a tu usuario de MySQL
    'password': "",  # Cambia a tu contraseña de MySQL
    'database': "login_register_db"
}

# Configurar logging para registrar errores
logging.basicConfig(filename='error.log', level=logging.ERROR)

# Función para obtener el nombre corto del equipo usando su ID
def obtener_nombre_equipo_visitante(team_id):
    nba_teams = teams.get_teams()
    for team in nba_teams:
        if team['id'] == team_id:
            return team['abbreviation']  # Cambiado para retornar solo la abreviatura
    return "Equipo no encontrado"

# Función para obtener el nombre corto del equipo usando su ID
def obtener_nombre_equipo_local(team_id):
    nba_teams = teams.get_teams()
    for team in nba_teams:
        if team['id'] == team_id:
            nombre_completo = team['full_name']  # Ejemplo: "Boston Celtics"
            nombre_equipo = nombre_completo.split()[-1]  # Extraer solo la última palabra
            return nombre_equipo  # Retornar solo la última palabra
    return "Equipo no encontrado"

# Función para obtener los próximos partidos
def obtener_proximos_partidos(dias_a_avanzar=10, reintentos=50, tiempo_espera=10):
    lista_partidos = []
    fecha_actual = datetime(2024, 12, 15)

    for i in range(dias_a_avanzar):
        fecha = fecha_actual + timedelta(days=i)
        fecha_formateada = fecha.strftime('%Y-%m-%d')
        
        for intento in range(reintentos):
            try:
                # Usar la API para obtener los partidos de ese día, con timeout explícito (mayor tiempo de espera)
                scoreboard = scoreboardv2.ScoreboardV2(game_date=fecha_formateada, timeout=tiempo_espera)
                
                # Obtener los datos del partido en un dataframe
                partidos_df = scoreboard.game_header.get_data_frame()

                if not partidos_df.empty:
                    # Recorrer cada partido y obtener los datos
                    for index, partido in partidos_df.iterrows():
                        try:
                            # Obtener IDs de los equipos
                            local_team_id = partido['HOME_TEAM_ID']
                            visitante_team_id = partido['VISITOR_TEAM_ID']
                            
                            # Convertir los IDs a nombres cortos
                            local_team = obtener_nombre_equipo_local(local_team_id)
                            visitante_team = obtener_nombre_equipo_visitante(visitante_team_id)
                            
                            # Obtener la fecha y hora del partido
                            fecha_partido = partido['GAME_DATE_EST']
                            fecha_obj = datetime.strptime(fecha_partido, '%Y-%m-%dT%H:%M:%S')

                            # Formatear la hora en formato TIME para MySQL (HH:MM:SS)
                            hora = fecha_obj.strftime('%H:%M:%S')  # Formato 24 horas

                            # Extraer el día y mes
                            dia = fecha_obj.day
                            mes = fecha_obj.month

                            # Agregar los datos del partido a la lista
                            lista_partidos.append((local_team, visitante_team, hora, dia, mes))
                        except KeyError as e:
                            logging.error(f"Error al procesar el partido {index}: {str(e)}")
                            continue  # Saltar al siguiente partido
                else:
                    print(f"No hay partidos programados para el día {fecha_formateada}.")

                # Si se llega aquí sin excepción, no necesitamos más reintentos
                break
            except requests.exceptions.Timeout as e:
                logging.error(f"Timeout al obtener partidos para la fecha {fecha_formateada} (intento {intento + 1}): {e}")
                print(f"Timeout: {e}, reintentando en {5 * (intento + 1)} segundos...")
                time.sleep(5 * (intento + 1))  # Aumentar el tiempo de espera con cada intento
            except Exception as e:
                logging.error(f"Error al obtener partidos para la fecha {fecha_formateada} (intento {intento + 1}): {e}")
                print(f"Error inesperado: {e}, reintentando en 5 segundos...")
                time.sleep(5)  # Esperar antes de reintentar

    return lista_partidos

# Función para verificar si un partido ya existe en la base de datos
def partido_existe(cursor, local, visitante, hora, dia, mes):
    query = """
    SELECT COUNT(*) FROM partidos 
    WHERE local = %s AND visitante = %s AND hora = %s AND dia = %s AND mes = %s
    """
    cursor.execute(query, (local, visitante, hora, dia, mes))
    return cursor.fetchone()[0] > 0  # Devuelve True si el partido existe

# Función para insertar los partidos en la base de datos
def insertar_partidos_en_bd(partidos):
    try:
        # Conectar a la base de datos
        conexion = mysql.connector.connect(**db_config)
        cursor = conexion.cursor()

        # Query para insertar los partidos
        insert_query = """
        INSERT INTO partidos (local, visitante, hora, dia, mes) 
        VALUES (%s, %s, %s, %s, %s)
        """

        # Ejecutar el query para cada partido
        for partido in partidos:
            local, visitante, hora, dia, mes = partido
            if not partido_existe(cursor, local, visitante, hora, dia, mes):
                cursor.execute(insert_query, partido)

        # Confirmar la inserción
        conexion.commit()

        print(f"{cursor.rowcount} partidos insertados en la base de datos.")
    
    except mysql.connector.Error as err:
        logging.error(f"Error al insertar los partidos en la base de datos: {err}")
        print(f"Error al insertar los partidos en la base de datos: {err}")
    
    finally:
        # Cerrar la conexión
        if conexion.is_connected():
            cursor.close()
            conexion.close()

# Obtener los próximos partidos (cambiar el número de días según sea necesario)
proximos_partidos = obtener_proximos_partidos(dias_a_avanzar=70, reintentos=50, tiempo_espera=10)  # Mayor tiempo de espera y más reintentos

# Insertar los partidos en la base de datos si hay datos
if proximos_partidos:
    insertar_partidos_en_bd(proximos_partidos)
else:
    print("No hay partidos para insertar en la base de datos.")
