<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$idIns = (isset($_POST['idIns'])) ? $_POST['idIns'] : '';
$cursoSe = (isset($_POST['cursoSe'])) ? $_POST['cursoSe'] : '';

$idAlumno='';
$idPlanEstudio='';
$idPlan='1';

 $consulta = "SELECT `idIns`, `idCurso`, `idAlumno` FROM `inscrip_curso_alumno` WHERE `idIns`='$idIns'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach($data as $dat) {

           $idAlumno=$dat['idAlumno'];

        }


  $consulta = "SELECT `idAlumnos`, `nombreAlumnos`, `dniAlumnos`, `cuilAlumnos`, `domicilioAlumnos`, `emailAlumnos`, `telefonoAlumnos`, `discapasidadAlumnos`, `nombreTutor`, `dniTutor`, `TelefonoTutor`, `idPlanEstudio` FROM `datosalumnos` WHERE `idAlumnos`='$idAlumno'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

  
    foreach($data as $dat) {

    		$idPlanEstudio=$dat['idPlanEstudio'];
    	
        }



 $consulta = "SELECT `idCurso`, `idPlan`, `ciclo`, `nombre` FROM `curso` WHERE `idCurso`='$cursoSe'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

  
    foreach($data as $dat) {

            $idPlan=$dat['idPlan'];
        
        }

if ($idPlanEstudio==$idPlan) {
    echo 0;
}else{
    echo 1;
}

 $conexion = NULL;
