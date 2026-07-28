<?php
$host = getenv('MYSQLHOST'); 
$usuario = getenv('MYSQLUSER');
$password = getenv('MYSQLPASSWORD');
$base_de_datos = getenv('MYSQLDATABASE'); 
$puerto = getenv('MYSQLPORT');

try {
    $dsn = "mysql:host=$host;port=$puerto;dbname=$base_de_datos;charset=utf8mb4";
    $opciones = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    
    $conexion = new PDO($dsn, $usuario, $password, $opciones);
    
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>