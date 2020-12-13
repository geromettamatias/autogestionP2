
<!--INICIO del cont principal-->
<div class="container">

 <?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
session_start();


if (isset($_SESSION['s_usuarioEstudiante'])){
$s_usuarioEstudiante=$_SESSION['s_usuarioEstudiante'];


         $c3onsulta = "SELECT `idAlumnos`, `nombreAlumnos`, `dniAlumnos`, `cuilAlumnos`, `domicilioAlumnos`, `emailAlumnos`, `telefonoAlumnos`, `discapasidadAlumnos`, `nombreTutor`, `dniTutor`, `TelefonoTutor` FROM `datosalumnos` WHERE `dniAlumnos`='$s_usuarioEstudiante'";
        $r3esultado = $conexion->prepare($c3onsulta);
        $r3esultado->execute();
        $d3ata=$r3esultado->fetchAll(PDO::FETCH_ASSOC);

        foreach($d3ata as $d3at) {
            $idAlumnos=$d3at['idAlumnos'];
            $nombreAlumnos=$d3at['nombreAlumnos'];
            $dniAlumnos=$d3at['dniAlumnos'];
         }



 
$consulta = "SELECT `idAnalitico`, `idPlan`, `idAsig`, `idAlumno`, `nota` FROM `analitico` WHERE `idAlumno`='$idAlumnos'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);


?>


<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <h2>Analítico</h2><br>
                    <h5>Apellido y Nombre del Alumno: <?php echo $nombreAlumnos; ?></h5>
                    <h5>DNI del Alumno: <?php echo $dniAlumnos; ?></h5>
                </div>
        </div>
</div>

 
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablanotas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                         

                                <th>Año</th> 
                                <th>Asignatura</th>
                                <th>Nota</th> 
                                                    
                    
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                
                                $idAsig=$dat['idAsig'];

                                $consulta = "SELECT `idAsig`, `idPlan`, `nombre`, `ciclo` FROM `plan_datos_asignaturas` WHERE `idAsig`='$idAsig'";
                                $resultado = $conexion->prepare($consulta);
                                $resultado->execute();
                                $d1ata=$resultado->fetchAll(PDO::FETCH_ASSOC);

                                foreach($d1ata as $d1at) {
                                    $ciclo=$d1at['ciclo'];
                                    $nombre=$d1at['nombre'];
                                }

                            ?>
                            <tr>
          
                                <td><?php echo $ciclo ?></td>
                                <td><?php echo $nombre ?></td>
                                <td><?php echo $dat['nota'] ?></td>
           
                             
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
      

      
<!--Modal para CRUD-->
 
  
</div>


 <script type="text/javascript">
$(document).ready(function(){


    var tablanotas = $('#tablanotas').DataTable({ 

        
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
        },
        //para usar los botones   
        responsive: "true",
        dom: 'Bfrtilp',       
        buttons:[ 
      {
        extend:    'excelHtml5',
        text:      '<i class="fas fa-file-excel"></i> ',
        titleAttr: 'Exportar a Excel',
        className: 'btn btn-success'
      },
      {
        extend:    'pdfHtml5',
        text:      '<i class="fas fa-file-pdf"></i> ',
        titleAttr: 'Exportar a PDF',
        className: 'btn btn-danger'
      },
      {
        extend:    'print',
        text:      '<i class="fa fa-print"></i> ',
        titleAttr: 'Imprimir',
        className: 'btn btn-info'
      },
    ]         
    });


   
    
});    
    



</script>




<?php  } ?>



