<?php

// Iniciamos sesión al principio de todo
session_start();

// 1. Si no se envió nada por POST, salimos silenciosamente
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

// Reportar errores para ver qué está pasando
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';
if (empty($_POST['nombre']) || empty($_POST['email'])) {
    echo "Error: Faltan datos obligatorios (nombre o email).";
    exit;
}

$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
$email = mysqli_real_escape_string($conexion, $_POST['email']);
$curso_id = mysqli_real_escape_string($conexion, $_POST['curso_id']);

// 1. Buscar o Crear Usuario
$check_usuario = mysqli_query($conexion, "SELECT id FROM usuarios WHERE email = '$email'");

if (mysqli_num_rows($check_usuario) > 0) {
    $fila = mysqli_fetch_assoc($check_usuario);
    $id_usuario = $fila['id'];
} else {
    mysqli_query($conexion, "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '1234')");
    $id_usuario = mysqli_insert_id($conexion);
}

// 2. Verificar si ya está inscrito
$check_insc = mysqli_query($conexion, "SELECT id FROM inscripciones WHERE usuario_id = '$id_usuario' AND curso_id = '$curso_id'");

if (mysqli_num_rows($check_insc) > 0) {
    // Si ya existe, aseguramos la sesión
    $_SESSION['inscrito_' . $curso_id] = true;
    session_write_close(); // Guardamos y cerramos la sesión antes de responder
    echo "existe";
} else {
    // 3. Inscripción
    $sql_ins = "INSERT INTO inscripciones (usuario_id, curso_id, nombre_usuario, fecha_inscripcion) 
                VALUES ('$id_usuario', '$curso_id', '$nombre', NOW())";
    
    if (mysqli_query($conexion, $sql_ins)) {
        // Creamos la llave para permitir el acceso al contenido
        $_SESSION['inscrito_' . $curso_id] = true;
        session_write_close(); // Guardamos y cerramos la sesión antes de responder
        echo "exito";
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
}
?>
