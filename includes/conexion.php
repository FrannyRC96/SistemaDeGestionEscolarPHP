<?php
$host = 'localhost';
$dbname = 'escuela';
$User = 'root';
$contraseña = '';

try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $User,$contraseña);
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Conexión exitosa";
}catch(PDOExeption $e){
    die("Error de conexión: ".$e->getMessage());
}
?>
