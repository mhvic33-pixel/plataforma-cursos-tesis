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

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$curso_id = $_POST['curso_id'];

// 1. Buscar o Crear Usuario usando PDO
$stmt = $conexion->prepare("SELECT id FROM usuarios WHERE email = ?");
$stmt->execute([$email]);
$fila = $stmt->fetch();

if ($fila) {
    $id_usuario = $fila['id'];
} else {
    $stmt_insert = $conexion->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, '1234')");
    $stmt_insert->execute([$nombre, $email]);
    $id_usuario = $conexion->lastInsertId();
}

// 2. Verificar si ya está inscrito
$stmt_insc = $conexion->prepare("SELECT id FROM inscripciones WHERE usuario_id = ? AND curso_id = ?");
$stmt_insc->execute([$id_usuario, $curso_id]);
$inscripcion_existente = $stmt_insc->fetch();

if ($inscripcion_existente) {
    // Si ya existe, aseguramos la sesión
    $_SESSION['inscrito_' . $curso_id] = true;
    session_write_close(); // Guardamos y cerramos la sesión antes de responder
    echo "existe";
} else {
    // 3. Inscripción
    $sql_ins = $conexion->prepare("INSERT INTO inscripciones (usuario_id, curso_id, nombre_usuario, fecha_inscripcion) 
                VALUES (?, ?, ?, NOW())");
    
    if ($sql_ins->execute([$id_usuario, $curso_id, $nombre])) {
        // Creamos la llave para permitir el acceso al contenido
        $_SESSION['inscrito_' . $curso_id] = true;
        session_write_close(); // Guardamos y cerramos la sesión antes de responder
        echo "exito";
    } else {
        echo "Error al registrar la inscripción.";
    }
}
?>