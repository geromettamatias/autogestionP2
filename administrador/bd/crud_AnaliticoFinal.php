<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$notas = (isset($_POST['notas'])) ? $_POST['notas'] : '';
$idAnalitico = (isset($_POST['idAnalitico'])) ? $_POST['idAnalitico'] : '';


   $consulta = "UPDATE `analitico` SET `nota`='$notas' WHERE `idAnalitico`='$idAnalitico'";  
     
    $resultado = $conexion->prepare($consulta);
    $resultado->execute(); 




echo $idAnalitico;
$conexion = NULL;