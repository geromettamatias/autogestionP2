<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$idIns = (isset($_POST['idIns'])) ? $_POST['idIns'] : '';

$idAlumno = (isset($_POST['idAlumno'])) ? $_POST['idAlumno'] : '';
$idCurso = (isset($_POST['idCurso'])) ? $_POST['idCurso'] : '';

$ciclo='';
$idAsig='';
$idPlan='';

$contador=0;
        $consulta = "SELECT `idCurso`, `idPlan`, `ciclo`, `nombre` FROM `curso` WHERE  `idCurso`='$idCurso'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

            foreach($data as $dat) { 
                    $idPlan=$dat['idPlan'];
                    $ciclo=$dat['ciclo'];
            }

   
                    $consulta = "SELECT `idAsig`, `idPlan`, `nombre`, `ciclo` FROM `plan_datos_asignaturas` WHERE `ciclo`='$ciclo' AND `idPlan`='$idPlan'";
                    $resultado = $conexion->prepare($consulta);
                    $resultado->execute();
                    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);


                    foreach($data as $dat) { 

                            $idAsig=$dat['idAsig'];
                            
                             $c1onsulta = "INSERT INTO `libreta_digital`(`id_libreta`, `idIns`, `idAsig`, `nota1`, `nota2`, `nota3`, `integrador`, `diciembre`, `marzo`, `nota_final`) VALUES (null,'$idIns','$idAsig','','','','','','','')";            
                            $r1esultado = $conexion->prepare($c1onsulta);
                            $r1esultado->execute(); 
                                       


                        }




echo '1';
        


$conexion = NULL;