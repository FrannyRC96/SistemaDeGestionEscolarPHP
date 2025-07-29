<?php
session_start();
include_once("../modelo/usuario.php");
//Este metodo es el encargado de revisar que tipo de usuario intenta entrar al la pagina
//es el login y asigna la sesión.
if($_SERVER['REQUEST_METHOD']==='POST' &&  isset($_POST['login'])){
    if(isset($_POST['login'])){

        $usuarioModelo = new Usuario();
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $resultado = $usuarioModelo ->verificarLogin($usuario,$clave);

        if($resultado){
            $_SESSION['nombre'] = $resultado['nombre'];
            $_SESSION['tipo'] = $resultado['tipo'];
            $_SESSION['id'] = $resultado['id'];
            
            if($resultado['tipo']==='profesor'){
                header("Location: ../vista/homeTeacher.php");
                exit;
            }else if($resultado['tipo']==='alumno'){
                header("Location: ../vista/home.php");
                exit;
            }
            else{
               header("Location: ../vista/homeAdmin.php");
                exit;
            }
           
        }else{
            header("Location: ../vista/login.php?error=1");
            exit;
        }
    }
}
//Este metodo es el controlador para el registro de usuarios en la bd
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['registrar'])){
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $tipo = $_POST['tipo'];
    
    $usuarioModelo = new Usuario();
    $resultado = $usuarioModelo ->CrearUsuario($nombre,$usuario,$clave,$tipo);

    if($resultado === 'Success'){
        header("Location: ../vista/login.php?registro=exito");
        exit;
    }else{
        echo "<p style='color:red; text-align:center;'>$resultado</p>";
    }
}
//Y este es el metodo que el administrador usa para cambiar contraseñas
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['cambiar_clave'])){
    $id = $_POST['id'];
    $nuevaClave = $_POST['nuevaClave'];

    $usuarioModelo = new Usuario();
    $resultado = $usuarioModelo->actualizarClave($id,$nuevaClave);

    if($resultado){
        header("Location: ../vista/homeAdmin.php?msg=Clave_Actualizada");
    }else{
        header("Location: ../vista/homeAdmin.php?msg=Clave_error");
    }
    exit;
}
?>