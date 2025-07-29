<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schoolar system</title>
</head>
<body>
    <h1 style="color: green; font-size: 36px; text-align: center; font-family: Morris Roman;">📝 Sign Up</h1>
    <br>
    <br>
    <form method="POST" action="../controlador/usuarioControlador.php">
        <div style =" width: 30%; margin: 0 auto; text-align: center; border: 3px solid black; padding: 30px;">
            <input type="text" name="nombre" placeholder="Name" required><br><br>
            <input type="text" name="usuario" placeholder="User" required><br><br>
            <input type="password" name="clave" placeholder="Password" required><br><br>
            <select name="tipo" required>
                <option value="">Select user type</option>
                <option value="alumno">Student</option>
                <option value="profesor">Teacher</option>
            </select><br><br>
            <input type="submit" name="registrar" value="Crear cuenta">
            <br><br>
            <a href="login.php"><h2 style="color:rgba(79, 12, 187, 0.97); font-size: 12px; text-align: center; font-family: Arial;">I have an account</h2></a>
        </div>
    </form>
</body>
</html>

