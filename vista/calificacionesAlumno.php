<?php
session_start();
//include_once("../modelo/conexion");
include_once("../modelo/calificaciones.php");
$idAlumno = isset($_GET['id']) ? $_GET['id'] : null;
$calificacionesModelo = new Calificacion();
$calificaciones = $calificacionesModelo->obtenerCalificaciones($idAlumno);
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
    <h2 style="color: rgba(25, 134, 120, 0.97); font-size: 20px; text-align: center; font-family: Arial;">View or edit Ratings for the student with id:  <?php echo htmlspecialchars($idAlumno); ?></h2>
        <form method="POST" action="../controlador/calificacionesControlador.php">
            <input type="hidden" name="idalumno" value=<?php echo $idAlumno;?>>
            <label>Spanish: </label>
            <input type="number" name="espanol" required value="<?php echo $calificaciones['espanol'] ?? ''; ?>"><br><br>
            <br>
            <label>Math: </label>
            <input type="number" name="matematicas" required value="<?php echo $calificaciones['matematicas'] ?? ''; ?>"><br><br>
            <br>
            <label>History: </label>
            <input type="number" name="historia" required value="<?php echo $calificaciones['historia'] ?? ''; ?>"><br><br>
            <br>
             <label>Music: </label>
            <input type="number" name="musica" required value="<?php echo $calificaciones['musica'] ?? ''; ?>"><br><br>
            <br>
            <button type="submit" name="save">Guardar Calificaciones</button>
        </form>
    </div>
</body>
</html>