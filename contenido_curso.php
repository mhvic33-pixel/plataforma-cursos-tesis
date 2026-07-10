<?php
// 1. Iniciamos sesión para verificar la "llave" de acceso
session_start();

// 2. Obtenemos el ID del curso de la URL
$id = $_GET['id'] ?? 0;

// 3. Verificamos si el usuario está inscrito en este curso específico
if (!isset($_SESSION['inscrito_' . $id])) {
    // Si no está inscrito, lo mandamos de vuelta al inicio
    header("Location: index.php?error=acceso_denegado");
    exit();
}

// 4. Datos del curso
$cursos = [
    1 => ["titulo" => "Dibujo a Lápiz", "video" => "https://www.youtube.com/embed/ejemplo1"],
    2 => ["titulo" => "Ejercicio", "video" => "https://www.youtube.com/embed/ejemplo2"],
    3 => ["titulo" => "Manualidades", "video" => "https://www.youtube.com/embed/ejemplo3"],
    4 => ["titulo" => "Matemáticas", "video" => "https://www.youtube.com/embed/ejemplo4"],
    5 => ["titulo" => "Ciberseguridad", "video" => "https://www.youtube.com/embed/ejemplo5"]
];

$c = $cursos[$id] ?? ["titulo" => "Curso", "video" => ""];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aula: <?php echo $c['titulo']; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/aula.css">
</head>
<body>

    <div class="aula-container">
        <h1><?php echo $c['titulo']; ?></h1>
        
        <div class="video-wrapper">
            <iframe src="<?php echo $c['video']; ?>" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="info-box">
            <h3>Bienvenido al contenido</h3>
            <p>Has desbloqueado el material exclusivo para este curso. ¡Sácale el máximo provecho!</p>
        </div>
        
        <a href="index.php" class="btn-volver">← Volver a mis cursos</a>
    </div>

</body>
</html>
