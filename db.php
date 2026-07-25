<?php
// Mantenemos tus variables. 
// Asegúrate de que en el Dashboard de Railway -> Variables, 
// tengas configurado DB_HOST, DB_USER, DB_PASSWORD, etc.
$host = getenv('DB_HOST'); 
$usuario = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$base_de_datos = getenv('DB_NAME'); 

try {
    // Definimos la conexión con PDO
    $dsn = "mysql:host=$host;dbname=$base_de_datos;charset=utf8mb4";
    $opciones = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    
    $conexion = new PDO($dsn, $usuario, $password, $opciones);
    
} catch (PDOException $e) {
    // Si hay error, lo muestra y detiene la ejecución
    die("Error de conexión: " . $e->getMessage());
}
?>
