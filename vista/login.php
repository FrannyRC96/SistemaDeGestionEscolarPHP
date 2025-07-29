<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schoolar system</title>
</head>
<body>
    <h1 style="color: green; font-size: 36px; text-align: center; font-family: Morris Roman;">☘️ Welcome to our School ☘️</h1>
    <br>
    <br>
    <form method="POST" action="../controlador/usuarioControlador.php">
        <div style =" width: 30%; margin: 0 auto; text-align: center; border: 3px solid black; padding: 30px;">
            <h2 style="color:rgba(4, 75, 65, 0.97); font-size: 24px; text-align: center; font-family: Arial;">Login</h2>
            <input type="text" name="usuario" placeholder="User" style="margin: 5px;"></br>
            <br>
            <input type="password" name="clave" placeholder="Password" style="margin: 5px;"></br>
            <br>
            <input type="submit" name="login" placeholder="Send" style="margin: 5px;"></br>
            <a href='singup.php'><h2 style="color:rgba(79, 12, 187, 0.97); font-size: 12px; text-align: center; font-family: Arial;">Dont have account? Sign up here</h2></a>
        </div>
    </form>
</body>
</html>

