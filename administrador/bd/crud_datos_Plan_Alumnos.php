<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   
 

$nombreAlumnos = (isset($_POST['nombreAlumnos'])) ? $_POST['nombreAlumnos'] : '';
$dniAlumnos = (isset($_POST['dniAlumnos'])) ? $_POST['dniAlumnos'] : '';
$cuilAlumnos = (isset($_POST['cuilAlumnos'])) ? $_POST['cuilAlumnos'] : '';
$domicilioAlumnos = (isset($_POST['domicilioAlumnos'])) ? $_POST['domicilioAlumnos'] : '';
$emailAlumnos = (isset($_POST['emailAlumnos'])) ? $_POST['emailAlumnos'] : '';
$telefonoAlumnos = (isset($_POST['telefonoAlumnos'])) ? $_POST['telefonoAlumnos'] : '';
$discapasidadAlumnos = (isset($_POST['discapasidadAlumnos'])) ? $_POST['discapasidadAlumnos'] : '';
$nombreTutor = (isset($_POST['nombreTutor'])) ? $_POST['nombreTutor'] : '';
$dniTutor = (isset($_POST['dniTutor'])) ? $_POST['dniTutor'] : '';

$TelefonoTutor = (isset($_POST['TelefonoTutor'])) ? $_POST['TelefonoTutor'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$idAlumnos = (isset($_POST['idAlumnos'])) ? $_POST['idAlumnos'] : '';

$idPlanEstudio = (isset($_POST['idPlanEstudio'])) ? $_POST['idPlanEstudio'] : '';



switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO `datosalumnos`(`nombreAlumnos`, `dniAlumnos`, `cuilAlumnos`, `domicilioAlumnos`, `emailAlumnos`, `telefonoAlumnos`, `discapasidadAlumnos`, `nombreTutor`, `dniTutor`, `TelefonoTutor`, `idPlanEstudio`) VALUES ('$nombreAlumnos','$dniAlumnos','$cuilAlumnos','$domicilioAlumnos','$emailAlumnos','$telefonoAlumnos','$discapasidadAlumnos','$nombreTutor','$dniTutor','$TelefonoTutor','$idPlanEstudio')";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT `idAlumnos`, `nombreAlumnos`, `dniAlumnos`, `cuilAlumnos`, `domicilioAlumnos`, `emailAlumnos`, `telefonoAlumnos`, `discapasidadAlumnos`, `nombreTutor`, `dniTutor`, `TelefonoTutor`, `idPlanEstudio` FROM `datosalumnos` ORDER BY `idAlumnos` DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE `datosalumnos` SET `nombreAlumnos`='$nombreAlumnos',`dniAlumnos`='$dniAlumnos',`cuilAlumnos`='$cuilAlumnos',`domicilioAlumnos`='$domicilioAlumnos',`emailAlumnos`='$emailAlumnos',`telefonoAlumnos`='$telefonoAlumnos',`discapasidadAlumnos`='$discapasidadAlumnos',`nombreTutor`='$nombreTutor',`dniTutor`='$dniTutor',`TelefonoTutor`='$TelefonoTutor',`idPlanEstudio`='$idPlanEstudio' WHERE `idAlumnos`='$idAlumnos'";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT `idAlumnos`, `nombreAlumnos`, `dniAlumnos`, `cuilAlumnos`, `domicilioAlumnos`, `emailAlumnos`, `telefonoAlumnos`, `discapasidadAlumnos`, `nombreTutor`, `dniTutor`, `TelefonoTutor`, `idPlanEstudio` FROM `datosalumnos` WHERE `idAlumnos`='$idAlumnos'";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM `datosalumnos` WHERE `idAlumnos`='$idAlumnos'";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
                                
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;