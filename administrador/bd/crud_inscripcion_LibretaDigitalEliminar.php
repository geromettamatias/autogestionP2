<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$idIns = (isset($_POST['idIns'])) ? $_POST['idIns'] : '';




$consulta = "DELETE FROM `libreta_digital` WHERE `idIns`='$idIns' ";      
$resultado = $conexion->prepare($consulta);
$resultado->execute();



echo '1';
        


$conexion = NULL;