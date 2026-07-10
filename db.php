<?php
// Datos de conexión (Cámbialos siempre que cambies de hosting)
$host = "sqlxxx.servidor.com";     // Aquí pondrás el "SQL Hostname" que te dé tu nuevo hosting
$usuario = "if0_12345678";        // Aquí pondrás el "MySQL Username"
$password = "tu_contraseña_segura"; // Aquí pondrás la contraseña que asignaste a la base
$base_de_datos = "if0_12345678_nombre_bd"; // El nombre de la base de datos

// Crear conexión
$conexion = mysqli_connect($host, $usuario, $password, $base_de_datos);

// Verificar conexión (Muy importante para detectar errores de inmediato)
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
// Opcional: Esto ayuda a que no haya problemas con acentos o eñes
mysqli_set_charset($conexion, "utf8");
?>
