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

include("../includes/conexion.php");
//esto trae alumnos
$stmt = $conn->prepare("SELECT id,nombre,usuario FROM usuarios WHERE tipo = 'alumno'");
$stmt->execute();
$alumnos = $stmt->fetchall(PDO::FETCH_ASSOC);

//esto trae profesores
$stmt2 = $conn->prepare("SELECT id,nombre,usuario FROM usuarios WHERE tipo = 'profesor'");
$stmt2->execute();
$maestros = $stmt2->fetchall(PDO::FETCH_ASSOC);
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
   <div style =" width: 40%; margin: 0 auto; text-align: center; border: 3px solid black; padding: 30px;">
     <h2 style="color: rgba(25, 134, 120, 0.97); font-size: 20px; text-align: center; font-family: Arial;">Welcome Administrator, <?php echo htmlspecialchars($_SESSION['nombre']); ?>!</h2> 
        <h3 style="margin-top: 30px; color: rgba(2, 34, 30, 0.97); font-size: 20px; text-align: center; font-family: Arial;">Lista de alumnos:</h3>
        <ul style="list-style: none; padding: 0; font-size: 16px;font-family: Arial; font-weight: bold; color: rgba(5, 90, 79, 0.9)">
            <?php foreach ($alumnos as $alumno): ?>
                <li style="margin-bottom: 10px;">
                    <?= htmlspecialchars($alumno['nombre']) ?>
            |     <a href="editarPassword.php?id=<?= $alumno['id'] ?>&tipo=alumno">Edit Password</a>
                </li>
                <?php endforeach; ?>
        </ul> 
        
        <h3 style="margin-top: 30px; color: rgba(2, 34, 30, 0.97); font-size: 20px; font-family: Arial;"> Lista de Profesores: </h3>
        <ul style="list-style: none; padding: 0; font-size: 16px; font-family: Arial; font-weight: bold; color: rgba(5, 90, 79, 0.9);">
            <?php foreach ($maestros as $profe): ?>
                <li style="margin-bottom: 10px;">
                    <?= htmlspecialchars($profe['nombre']) ?> |
                    <a href="editarPassword.php?id=<?= $profe['id'] ?>&tipo=profesor">Edit Password</a>
                </li>
            <?php endforeach; ?>
        </ul>


        <form action="../includes/logout.php" method="POST" style="margin-top: 20px;">
         <button type="submit" style="padding: 5px 7px; font-size: 10px;">Logout</button>
        </form>
    
    </div>
</body>
</html>