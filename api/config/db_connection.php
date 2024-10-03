<?php
/* PostgreSQL database connection 
developer: Angely 
*/

$host = "localhost"; // 127.0.0.1
$username = "postgres";
$password = "unicesmag";
$dbname = "beta";
$port = "5432";

// crear string de conexiones
$data_connection = "
host=$host 
port=$port 
dbname=$dbname 
user=$username 
password=$password";

// crear la conexion
$conn = pg_connect($data_connection);

// verificar la conexion
if (!$conn) {
    die("connection failed: " . pg_last_error());
} else {
    echo "Connected successfully";
}

// cerrar la conexion
//pg_close($conn);
?>
