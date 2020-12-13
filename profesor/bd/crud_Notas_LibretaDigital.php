<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   
    
$id_libreta = (isset($_POST['id_libreta'])) ? $_POST['id_libreta'] : '';
$nota1 = (isset($_POST['nota1'])) ? $_POST['nota1'] : '';
$nota2 = (isset($_POST['nota2'])) ? $_POST['nota2'] : '';
$nota3 = (isset($_POST['nota3'])) ? $_POST['nota3'] : '';


$Integrador = (isset($_POST['Integrador'])) ? $_POST['Integrador'] : '';
$diciembre = (isset($_POST['diciembre'])) ? $_POST['diciembre'] : '';
$marzo = (isset($_POST['marzo'])) ? $_POST['marzo'] : '';
$final = (isset($_POST['final'])) ? $_POST['final'] : '';




        $consulta = "UPDATE `libreta_digital` SET `nota1`='$nota1',`nota2`='$nota2',`nota3`='$nota3',`integrador`='$Integrador',`diciembre`='$diciembre',`marzo`='$marzo',`nota_final`='$final' WHERE `id_libreta`='$id_libreta'";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT `id_libreta`, `idIns`, `idAsig`, `nota1`, `nota2`, `nota3`, `integrador`, `diciembre`, `marzo`, `nota_final` FROM `libreta_digital` WHERE `id_libreta`='$id_libreta' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;