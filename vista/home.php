<?php
session_start();
if (!isset($_SESSION['nombre'])) {
    // Si no hay sesión, redirige al login
    header("Location: login.php");
    exit;
}
// Mostrar mensaje si viene con error
if (isset($_GET['error']) && $_GET['error'] == 1) {
    echo "<script>alert('Usuario o contraseña inválidos');</script>";
}
include_once("../modelo/calificaciones.php");
$calificacionesModelo = new Calificacion();
$idAlumno = $_SESSION['id'];
$notas = $calificacionesModelo -> obtenerCalificaciones($idAlumno);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1 style="color: green; font-size: 36px; text-align: center; font-family: Morris Roman;">☘️ Welcome to our School ☘️</h1>
    <br>
    <br>
   <div style =" width: 30%; margin: 0 auto; text-align: center; border: 3px solid black; padding: 30px;">
        <h2 style="color: rgba(25, 134, 120, 0.97); font-size: 20px; text-align: center; font-family: Arial;">Welcome Student, <?php echo htmlspecialchars($_SESSION['nombre']); ?>!</h2>
        <?php if($notas): ?>
            <ul style="list-style: none; padding: 0; font-family: Arial; font-weight: bold; color: rgba(5, 90, 79, 0.9)">
                <li>Spanish: <?php echo $notas['espanol']; ?></li>
                <li>Mathematics: <?php echo $notas['matematicas']; ?></li>
                <li>History: <?php echo $notas['historia']; ?></li>
                <li>Music: <?php echo $notas['musica']; ?></li>
                <li>GPA: <?php echo number_format($notas['promedio'], 1); ?></li>
            </ul>
        <?php else: ?>
            <p style="color: red;">Aún no se han registrado tus calificaciones.</p>
        <?php endif; ?>
        <br>
        <form action="../includes/logout.php" method="POST" style="margin-top: 20px;">
         <button type="submit" style="padding: 5px 7px; font-size: 10px;">Logout</button>
        </form>
        </div>
</body>
</html>