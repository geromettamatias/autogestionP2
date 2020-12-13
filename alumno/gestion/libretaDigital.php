
<!--INICIO del cont principal-->
<div class="container">


<br><br>
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


$idIns='';
  $consulta = "SELECT `idIns`, `idCurso`, `idAlumno` FROM `inscrip_curso_alumno` WHERE `idAlumno`='$idAlumnos'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $dat) {
            $idIns=$dat['idIns'];
         }


 
$consulta = "SELECT `id_libreta`, `idIns`, `idAsig`, `nota1`, `nota2`, `nota3`, `integrador`, `diciembre`, `marzo`, `nota_final` FROM `libreta_digital` WHERE  `idIns`='$idIns'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);







?>
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <h2>Libreta Digital</h2><br>
                    <h5>Apellido y Nombre del Alumno: <?php echo $nombreAlumnos; ?></h5>
                    <h5>DNI del Alumno: <?php echo $dniAlumnos; ?></h5>
                </div>
        </div>
</div>



 
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaLibreta" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                                       
                    
                                <th>Asignatura</th>
                                <th>N°1</th> 
                                <th>N°2</th>
                                <th>N°3</th>
                                <th>N°I</th>
                                <th>N°D</th> 
                                <th>N°M</th>
                                <th>N°F</th>                          
             
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {

                            $idAsig=$dat['idAsig'];
                            $nota1=$dat['nota1'];
                            $nota2=$dat['nota2'];
                            $nota3=$dat['nota3'];
                            $integrador=$dat['integrador'];
                            $diciembre=$dat['diciembre'];
                            $marzo=$dat['marzo'];
                            $nota_final=$dat['nota_final']; 
 

                                    $c1onsulta = "SELECT `idAsig`, `idPlan`, `nombre`, `ciclo` FROM `plan_datos_asignaturas` WHERE `idAsig`='$idAsig'";
                                        $r1esultado = $conexion->prepare($c1onsulta);
                                        $r1esultado->execute();
                                        $d1ata=$r1esultado->fetchAll(PDO::FETCH_ASSOC);

                                         foreach($d1ata as $d1at) {
                                            $nombre=$d1at['nombre'];
                                            } 
 


                            ?>
                            <tr>

                         
          
                                <td><?php echo $nombre; ?></td>
                                <td><?php echo $nota1; ?></td>
                                <td><?php echo $nota2; ?></td>
                                <td><?php echo $nota3; ?></td> 
                                <td><?php echo $integrador; ?></td>
                                <td><?php echo $diciembre; ?></td>
                                <td><?php echo $marzo; ?></td>
                                <td><?php echo $nota_final; ?></td>
           
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
      

   
  
</div>


 <script type="text/javascript">
$(document).ready(function(){


    var tablaLibreta = $('#tablaLibreta').DataTable({ 

    

        
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



   <?php
                                }
                            ?> 

