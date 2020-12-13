<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$idAlumnos = (isset($_POST['idAlumnos'])) ? $_POST['idAlumnos'] : '';
$conta='';

 $consulta = "SELECT `idIns`, `idCurso`, `idAlumno` FROM `inscrip_curso_alumno` WHERE `idAlumno`='$idAlumnos'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach($data as $dat) {

           $conta=$dat['idCurso'];


        }


  $consulta = "SELECT `idCurso`, `idPlan`, `ciclo`, `nombre` FROM `curso` WHERE `idCurso`='$conta'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

    $final=0;

    foreach($data as $dat) {

    		$ciclo=$dat['ciclo'];
    		$nombre=$dat['nombre'];

           $final=$ciclo.'--'.$nombre;


        }


 $conexion = NULL;
 echo $final;