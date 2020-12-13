<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$idIns = (isset($_POST['idIns'])) ? $_POST['idIns'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

$idAlumnos = (isset($_POST['idAlumnos'])) ? $_POST['idAlumnos'] : '';
$cursoSe = (isset($_POST['cursoSe'])) ? $_POST['cursoSe'] : '';






switch($opcion){
    case 1: //alta
        $consulta = "INSERT  INTO `inscrip_curso_alumno`(`idIns`, `idCurso`, `idAlumno`) VALUES (null,'$cursoSe','$idAlumnos')";            
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT `idIns`, `idCurso`, `idAlumno` FROM `inscrip_curso_alumno` ORDER BY idIns DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;      
    case 2://baja
        
         $consulta = "DELETE FROM `inscrip_curso_alumno` WHERE `idIns`='$idIns' ";      
         $resultado = $conexion->prepare($consulta);
         $resultado->execute();
      
          $data=2;                      
        break;
     case 3://Cambio
        
         $consulta = "UPDATE `inscrip_curso_alumno` SET `idCurso`='$cursoSe' WHERE `idIns`='$idIns'";      
         $resultado = $conexion->prepare($consulta);
         $resultado->execute();
      
          $data=2;                      
        break;            
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;