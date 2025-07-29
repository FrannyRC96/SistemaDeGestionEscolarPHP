<?php
session_start();
include_once("../modelo/calificaciones.php");

//Primero hay que checar que el usuario sea de tipo profesor
if(!isset($_SESSION['tipo']) || $_SESSION['tipo']!== 'profesor'){
    header("Location: ../vista/login.php");
    exit;
}
//Esto es el metodo que agrega o edita calificaciones
if($_SERVER['REQUEST_METHOD']=== 'POST' && isset($_POST['save'])){
    $idalumno = $_POST['idalumno'];
    $espanol = floatval($_POST['espanol']);
    $matematicas = floatval($_POST['matematicas']);
    $historia = floatval($_POST['historia']);
    $musica = floatval($_POST['musica']);

    $calificacionModelo = new Calificacion();
    //revisar si existen calificaciones para dicho alumno:
    $existe = $calificacionModelo->obtenerCalificaciones($idalumno);
    if($existe){
        $resultado = $calificacionModelo->actualizarCalificaciones($idalumno,$espanol,$matematicas,$historia,$musica);
    }else{
        $resultado = $calificacionModelo->agregarCalificaciones($idalumno,$espanol,$matematicas,$historia,$musica);
    }

    if($resultado){
        header("Location: ../vista/homeTeacher.php?msg=calificaciones_Guardadas");
    }else{
        echo "Error al guardar calificaciones";
    }
}
?>