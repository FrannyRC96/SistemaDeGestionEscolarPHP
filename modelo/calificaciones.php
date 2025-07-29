<?php
class Calificacion{
    private $conn;

    public function __construct(){
        include("../includes/conexion.php");
        $this ->conn = $conn;
    }

    //Ingresar calificaciones por primera vez
    public function agregarCalificaciones($idalumno,$espanol,$matematicas,$historia,$musica){
        $promedio = ($espanol+$matematicas+$historia+$musica)/4;
        $stmt = $this ->conn->prepare("INSERT INTO calificaciones (id_alumno,espanol,matematicas,historia,musica,promedio) VALUES (?,?,?,?,?,?)");
        return $stmt ->execute([$idalumno,$espanol,$matematicas,$historia,$musica,$promedio]);
    }
    //obtener las calificaciones del alumno
    public function obtenerCalificaciones($idalumno){
        $stmt = $this ->conn->prepare("SELECT * FROM calificaciones WHERE id_alumno = ?");
        $stmt->execute([$idalumno]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Actualiza las calificaciones
    public function actualizarCalificaciones($idalumno,$espanol,$matematicas,$historia,$musica){
        $promedio = ($espanol+$matematicas+$historia+$musica)/4;
        $stmt = $this ->conn->prepare("UPDATE calificaciones SET espanol = ?, matematica = ?, historia = ?, musica = ?, promedio = ? WHERE id_alumno = ?");
        return $stmt ->execute([$espanol,$matematicas,$historia,$musica,$promedio,$idalumno]);
  
    }


}
?> 