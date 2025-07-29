<?php
class Usuario{
    private $conn;
    public function __construct(){
        include("../includes/conexion.php");
        $this->conn = $conn;
    }
    //Verifica que exista el usuario en sistema
    public function verificarLogin($usuario,$clave){
        $stmt = $this ->conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $stmt->execute([$usuario]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($clave,$user['clave'])){
            return $user;
        }
        return false;
    }
    //esto crea un nuevo usuario
    public function CrearUsuario($nombre,$usuario,$clave,$tipo){
        //primero hay que validar que el usuario no exista
        $stmt = $this->conn->prepare("SELECT id FROM usuarios WHERE usuario = ?");
        $stmt-> execute([$usuario]);
        if($stmt->rowCount() > 0){
            return "The user already exist";
        }
        //hash es para encriptar la contraseña
        $claveHash = password_hash($clave, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre,usuario,clave,tipo) VALUES (?,?,?,?)");
        if($stmt->execute([$nombre,$usuario,$claveHash,$tipo])){
            return "Success";
        }else{
            return "Something went wrong";
        }
    }
    //Este es el metodo que actualiza la contraseña
    public function actualizarClave($idusuario, $claveNueva){
        $claveHash = password_hash($claveNueva, PASSWORD_DEFAULT);
        $stmt = $this ->conn->prepare("UPDATE usuarios SET clave = ? WHERE id=?");
        return $stmt->execute([$claveHash,$idusuario]);
    }
}
?>