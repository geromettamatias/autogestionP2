<?php  
                    include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

                $consulta = "SELECT `idAlumnos`, `nombreAlumnos`, `dniAlumnos`, `cuilAlumnos`, `domicilioAlumnos`, `emailAlumnos`, `telefonoAlumnos`, `discapasidadAlumnos`, `nombreTutor`, `dniTutor`, `TelefonoTutor`, `idPlanEstudio` FROM `datosalumnos`";
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
                $data=$resultado->fetchAll(PDO::FETCH_ASSOC);


?>

<br><br><br>
<h1>LISTA DE ALUMNOS</h1>

<br><br>

          <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">       
                        <table id="tablaAlu"  class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                         
                                <th>N°</th>
                                <th>Orientación</th> 
                                <th>DNI</th>
                                <th>Apellido y Nombre</th> 
                         

                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {

                                    $idPlanEstudio=$dat['idPlanEstudio'];

                                    $idAlumnos=$dat['idAlumnos'];
                                    $dniAlumnos=$dat['dniAlumnos'];
                                    $nombreAlumnos=$dat['nombreAlumnos'];

                                    $datos=$idAlumnos.'||'.$idPlanEstudio;
                                         

                                    $nombre="";

                                    
                                      $consulta = "SELECT `idPlan`, `idInstitucion`, `nombre`, `numero` FROM `plan_datos` WHERE `idPlan`='$idPlanEstudio'";
                                        $resultado = $conexion->prepare($consulta);
                                        $resultado->execute();
                                        $d5ata=$resultado->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($d5ata as $d5at) {
                                               $nombre=$d5at['nombre'];

                                            }
                                                              
                            ?>
                            <tr>
                             
                                <td><?php echo $idAlumnos; ?></td>
                                <td><?php echo $nombre; ?></td>
                                <td><?php echo $dniAlumnos; ?></td>
                                <td><?php echo $nombreAlumnos; ?></td>
        

                                  <td><button class="btn btn-info glyphicon glyphicon-pencil" onclick="botonInscribir('<?php echo $datos; ?>')">Inscribir</button>

                                    </td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>  

                    </div> 

                    </div>

                </div>



<script type="text/javascript">
$(document).ready(function(){

    var tablaAlu = $('#tablaAlu').DataTable({ 

    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });


});





</script>














