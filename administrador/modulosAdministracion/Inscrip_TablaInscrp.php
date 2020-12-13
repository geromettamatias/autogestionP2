<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
session_start();


if ((isset($_SESSION['cursoSe']))){
$cursoSe=$_SESSION['cursoSe'];


if ($cursoSe!='0'){


 
$consulta = "SELECT `idIns`, `idCurso`, `idAlumno` FROM `inscrip_curso_alumno` WHERE `idCurso`='$cursoSe'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);


?>



 
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaInscripcion" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Sel</th>
                                <th>N°inscrip</th>
                                <th>DNI</th>
                                <th>Apellido y Nombre</th>
                      
                            </tr>
                        </thead>
                        <tbody>
                            <?php  

                            foreach($data as $dat) { 

                              

                                $idIns=$dat['idIns'];
                                $idAlumno=$dat['idAlumno'];

                              


                                $consulta1 = "SELECT `idAlumnos`, `nombreAlumnos`, `dniAlumnos`, `cuilAlumnos`, `domicilioAlumnos`, `emailAlumnos`, `telefonoAlumnos`, `discapasidadAlumnos`, `nombreTutor`, `dniTutor`, `TelefonoTutor`, `idPlanEstudio` FROM `datosalumnos` WHERE `idAlumnos`='$idAlumno'";
                                    $resultado1 = $conexion->prepare($consulta1);
                                    $resultado1->execute();
                                    $d1ata=$resultado1->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($d1ata as $d1at) {

                                        $dniAlumnos=$d1at['dniAlumnos'];
                                        $nombreAlumnos=$d1at['nombreAlumnos'];

                                        
                                    }
                            ?>
                            <tr>
                              
                                <td><label><input type='checkbox' name='inscrp' value="<?php echo $idIns ?>"> AsClick</label></td>
                                
                                <td><?php echo $idIns ?></td>

                                <td><?php echo $dniAlumnos ?></td>
                             
                                <td><?php echo $nombreAlumnos ?></td>
           
                               

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
      
<button class="btn btn-success glyphicon glyphicon-pencil" onclick="botonInscripcion('')">Nueva Inscripción</button>

<button class="btn btn-danger glyphicon glyphicon-pencil" onclick="botonMuchosPregunta('1')">Eliminar Seleción</button>


<button class="btn btn-info glyphicon glyphicon-pencil" onclick="botonMuchosPregunta('2')">Cambio de Curso</button>



<?php  }

} ?>






  



<script type="text/javascript">
$(document).ready(function(){

var tablaInscripcion = $('#tablaInscripcion').DataTable({ 

    
        
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