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

$id = $_GET['id'] ?? null;
$tipo = $_GET['tipo'] ?? null;

if (!$id || !$tipo) {
    echo "Parámetros inválidos.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Contraseña</title>
</head>
<body>
    <h1 style="color: green; font-size: 36px; text-align: center; font-family: Morris Roman;">☘️ Welcome to our School ☘️</h1>
    <br>
    <br>
    <div style =" width: 40%; margin: 0 auto; text-align: center; border: 3px solid black; padding: 30px;">
     <h2 style="color: rgba(25, 134, 120, 0.97); font-size: 20px; text-align: center; font-family: Arial;">Welcome Administrator, <?php echo htmlspecialchars($_SESSION['nombre']); ?>!</h2> 
     <h3 style="margin-top: 30px; color: rgba(2, 34, 30, 0.97); font-size: 20px; font-family: Arial;">Cambiar contraseña para el <?= htmlspecialchars($tipo) ?> con ID <?= htmlspecialchars($id) ?></h3>
        <form action="../controlador/usuarioControlador.php" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
            <input type="hidden" name="tipo" value="<?= htmlspecialchars($tipo) ?>">
            <label>Nueva Contraseña:</label><br>
            <input type="password" name="nuevaClave" required><br><br>
            <button type="submit" name="cambiar_clave">Actualizar</button>
        </form>
    </div>
</body>
</html>
