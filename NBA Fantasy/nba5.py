import mysql.connector
from mysql.connector import Error
from nba_api.stats.endpoints import leaguestandings

# Configuración de la base de datos
db_config = {
    'host': "localhost",
    'user': "root",  # Cambia a tu usuario de MySQL
    'password': "",  # Cambia a tu contraseña de MySQL
    'database': "login_register_db"
}

# Función para conectar a la base de datos
def create_connection(config):
    try:
        connection = mysql.connector.connect(**config)
        if connection.is_connected():
            print("Conexión a la base de datos exitosa")
            return connection
    except Error as e:
        print(f"Error: {e}")
        return None

# Función para guardar estadísticas de posiciones en la base de datos
def save_standings_to_db(connection):
    try:
        # Obtener datos de la API de NBA
        response = leaguestandings.LeagueStandings(season='2023-24').get_data_frames()[0]

        # Imprimir las columnas disponibles en el DataFrame
        print("Columnas disponibles en el DataFrame:")
        print(response.columns)

        # Crear cursor para ejecutar las consultas
        cursor = connection.cursor()
        
        # Preparar la consulta de inserción
        insert_query = """
        INSERT INTO posiciones (diminutivo, nombre, ganados, perdidos) 
        VALUES (%s, %s, %s, %s)
        ON DUPLICATE KEY UPDATE ganados = VALUES(ganados), perdidos = VALUES(perdidos);
        """  # Actualiza los registros si ya existen

        # Iterar sobre los datos y guardarlos en la base de datos
        for index, row in response.iterrows():
            diminutivo = ""  # Cambiar a la columna correcta
            nombre = row['TeamName']           # Asegúrate de que esta columna existe
            ganados = row['WINS']
            perdidos = row['LOSSES']
            
            cursor.execute(insert_query, (diminutivo, nombre, ganados, perdidos))
        
        connection.commit()  # Confirmar la transacción
        print("Estadísticas de posiciones guardadas exitosamente en la base de datos.")
        
    except Error as e:
        print(f"Error al guardar en la base de datos: {e}")

# Main
if __name__ == "__main__":
    connection = create_connection(db_config)
    if connection:
        save_standings_to_db(connection)
        connection.close()  # Cerrar la conexión
