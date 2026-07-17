<?php
// Configuración para entorno local (XAMPP)
$host = "localhost";
$usuario = "root";
$password = ""; // Por defecto, XAMPP no tiene contraseña
$base_de_datos = "skillup"; // Asegúrate de que tu base de datos en phpMyAdmin se llame así

// Crear conexión
$conexion = mysqli_connect($host, $usuario, $password, $base_de_datos);

// Verificar conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Configurar codificación para caracteres especiales (tildes, ñ)
mysqli_set_charset($conexion, "utf8");
?>
