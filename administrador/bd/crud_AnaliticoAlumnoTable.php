<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

$idAlumnos = (isset($_POST['idAlumnos'])) ? $_POST['idAlumnos'] : '';
$idPlanEstudio = (isset($_POST['idPlanEstudio'])) ? $_POST['idPlanEstudio'] : '';

$idAsig='';

switch($opcion){
    case 1:


         $consulta = "SELECT `idAsig`, `idPlan`, `nombre`, `ciclo` FROM `plan_datos_asignaturas` WHERE `idPlan`='$idPlanEstudio'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $d1ata=$resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach($d1ata as $d1at) {

           $idAsig=$d1at['idAsig'];

        


        $consulta = "INSERT INTO `analitico`(`idAnalitico`, `idPlan`, `idAsig`, `idAlumno`, `nota`) VALUES (null,'$idPlanEstudio','$idAsig','$idAlumnos','')";            
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        
        }




        break;      
    case 3://baja
        
         $consulta = "DELETE FROM `analitico` WHERE `idAlumno`='$idAlumnos'";      
         $resultado = $conexion->prepare($consulta);
         $resultado->execute();
                           
        break;
     case 2://Cambio


        
         $consulta = "DELETE FROM `analitico` WHERE `idAlumno`='$idAlumnos'";      
         $resultado = $conexion->prepare($consulta);
         $resultado->execute();
      
    

         $consulta = "SELECT `idAsig`, `idPlan`, `nombre`, `ciclo` FROM `plan_datos_asignaturas` WHERE `idPlan`='$idPlanEstudio'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $d1ata=$resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach($d1ata as $d1at) {

           $idAsig=$d1at['idAsig'];

        


        $consulta = "INSERT INTO `analitico`(`idAnalitico`, `idPlan`, `idAsig`, `idAlumno`, `nota`) VALUES (null,'$idPlanEstudio','$idAsig','$idAlumnos','')";            
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        
        }



        break;            
}


echo $idAlumnos;

$conexion = NULL;