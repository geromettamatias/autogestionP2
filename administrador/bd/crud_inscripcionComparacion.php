<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$idPlanEstudio = (isset($_POST['idPlanEstudio'])) ? $_POST['idPlanEstudio'] : '';

$cursoSe = (isset($_POST['cursoSe'])) ? $_POST['cursoSe'] : '';

$conta=0;
 $consulta = "SELECT `idCurso`, `idPlan`, `ciclo`, `nombre` FROM `curso` WHERE `idPlan`='$idPlanEstudio' AND `idCurso`='$cursoSe'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $d5ata=$resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach($d5ata as $d5at) {
           $conta=1;

        } //enviar el array final en formato json a JS

echo $conta;
$conexion = NULL;