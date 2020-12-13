
<!--INICIO del cont principal-->
<div class="container">

 <?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
session_start();



 
$consulta = "SELECT `idAlumnos`, `nombreAlumnos`, `dniAlumnos`, `cuilAlumnos`, `domicilioAlumnos`, `emailAlumnos`, `telefonoAlumnos`, `discapasidadAlumnos`, `nombreTutor`, `dniTutor`, `TelefonoTutor` FROM `datosalumnos`";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);


?>



 
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaAlumnoNuevo" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                         
                                <th>N°</th> 
                                <th>DNI</th>
                                <th>Apellido y Nombre</th> 
                         

                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {           

                             $idAlumnos=$dat['idAlumnos'];
                             $dniAlumnos=$dat['dniAlumnos'];
                             $nombreAlumnos=$dat['nombreAlumnos']; 

                            ?>
                            <tr>
                             
                                <td><?php echo $idAlumnos; ?></td>
                                <td><?php echo $dniAlumnos; ?></td>
                                <td><?php echo $nombreAlumnos; ?></td>
        

                                <td><button class="btn btn-outline-danger glyphicon glyphicon-pencil" onclick="analiticosFinal('<?php echo $idAlumnos; ?>')">Analíticos</button>

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
      

        

</div>


 <script type="text/javascript">
$(document).ready(function(){

    var tablaAlumno = $('#tablaAlumnoNuevo').DataTable({ 

          
  
        
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

