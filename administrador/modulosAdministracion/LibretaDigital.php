
<!--INICIO del cont principal-->
<div class="container">



<button type="button" class="btn btn-outline-warning btn-block" id="RegresarLibreta">Libreta Digital <span class="badge badge-light"> Regresar lista de Alumno del curso</span></button>

<br><br>
 <?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
session_start();





if (isset($_SESSION['idIns'])){
$idIns=$_SESSION['idIns'];


if ($idIns!=1){


        $c2onsulta = "SELECT `idIns`, `idCurso`, `idAlumno` FROM `inscrip_curso_alumno` WHERE `idIns`='$idIns'";
        $r2esultado = $conexion->prepare($c2onsulta);
        $r2esultado->execute();
        $d2ata=$r2esultado->fetchAll(PDO::FETCH_ASSOC);

        foreach($d2ata as $d2at) {
            $idAlumno=$d2at['idAlumno'];
         }

         $c3onsulta = "SELECT `idAlumnos`, `nombreAlumnos`, `dniAlumnos`, `cuilAlumnos`, `domicilioAlumnos`, `emailAlumnos`, `telefonoAlumnos`, `discapasidadAlumnos`, `nombreTutor`, `dniTutor`, `TelefonoTutor` FROM `datosalumnos` WHERE `idAlumnos`='$idAlumno'";
        $r3esultado = $conexion->prepare($c3onsulta);
        $r3esultado->execute();
        $d3ata=$r3esultado->fetchAll(PDO::FETCH_ASSOC);

        foreach($d3ata as $d3at) {
            $nombreAlumnos=$d3at['nombreAlumnos'];
            $dniAlumnos=$d3at['dniAlumnos'];
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
                                                       
                                <th>N°Lib</th> 
                                <th>Asignatura</th>
                                <th>N°1</th> 
                                <th>N°2</th>
                                <th>N°3</th>
                                <th>N°I</th>
                                <th>N°D</th> 
                                <th>N°M</th>
                                <th>N°F</th>                          
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {

                            $id_libreta=$dat['id_libreta'];
                            $idAsig=$dat['idAsig'];
                            $nota1=$dat['nota1'];
                            $nota2=$dat['nota2'];
                            $nota3=$dat['nota3'];
                            $integrador=$dat['integrador'];
                            $diciembre=$dat['diciembre'];
                            $marzo=$dat['marzo'];
                            $nota_final=$dat['nota_final']; 
 

                                    $c1onsulta = "SELECT `idAsig`, `idPlan`, `nombre`, `ciclo`, `idDocente` FROM `plan_datos_asignaturas` WHERE `idAsig`='$idAsig'";
                                        $r1esultado = $conexion->prepare($c1onsulta);
                                        $r1esultado->execute();
                                        $d1ata=$r1esultado->fetchAll(PDO::FETCH_ASSOC);

                                         foreach($d1ata as $d1at) {
                                            $nombre=$d1at['nombre'];
                                            } 
 


                            ?>
                            <tr>

                         
                                <td><?php echo $id_libreta; ?></td>
                                <td><?php echo $nombre; ?></td>
                                <td><?php echo $nota1; ?></td>
                                <td><?php echo $nota2; ?></td>
                                <td><?php echo $nota3; ?></td> 
                                <td><?php echo $integrador; ?></td>
                                <td><?php echo $diciembre; ?></td>
                                <td><?php echo $marzo; ?></td>
                                <td><?php echo $nota_final; ?></td>
           
                                <td></td>
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
<div class="modal fade" id="modalCRUD_Libreta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formPersonasLibreta">    
                         
            <div class="modal-body">
            
              
               
                
                <label for="asiganturaLibreta" class="col-form-label">Asignatura: <div id="asiganturaLibreta"></div></label>
                
                
                              
              
               
                <div class="form-group">
                <label for="nota1" class="col-form-label">Notas 1:</label>
                <input type="text" class="form-control" id="nota1">
                </div>                
               
          
               
                <div class="form-group">
                <label for="nota1" class="col-form-label">Notas 2:</label>
                <input type="text" class="form-control" id="nota2">
                </div>                
               
       
               
                <div class="form-group">
                <label for="nota1" class="col-form-label">Notas 3:</label>
                <input type="text" class="form-control" id="nota3">
                </div>                
               

                <div class="form-group">
                <label for="Integrador" class="col-form-label">Integrador:</label>
                <input type="text" class="form-control" id="Integrador">
                </div>                
               
           
               
                <div class="form-group">
                <label for="diciembre" class="col-form-label">Diciembre:</label>
                <input type="text" class="form-control" id="diciembre">
                </div>                
               
        
          
                <div class="form-group">
                <label for="marzo" class="col-form-label">Marzo:</label>
                <input type="text" class="form-control" id="marzo">
                </div>

                <div class="form-group">
                <label for="final" class="col-form-label">Nota Final:</label>
                <input type="text" class="form-control" id="final">
                </div>                 
               
                 
                               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
  
</div>


 <script type="text/javascript">
$(document).ready(function(){


    var tablaLibreta = $('#tablaLibreta').DataTable({ 

    
    "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<button class='btn btn-outline-info btnEditar_Libreta'>Editar</button>"  
       }],
        
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



$("#RegresarLibreta").click(function(){

    $('#buscarTablaInstitucional').show();

    $('#tablaInstitucional').load('modulosAdministracion/Notas_TablaInscrp.php');
          
    $('#contenidoAyuda').html('');


}); 


var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar_Libreta", function(){
    fila = $(this).closest("tr");

 
    id_libreta = parseInt(fila.find('td:eq(0)').text());

    nombre = fila.find('td:eq(1)').text();

    nota1 = fila.find('td:eq(2)').text();
    nota2 = fila.find('td:eq(3)').text();
    nota3 = fila.find('td:eq(4)').text();
    integrador = fila.find('td:eq(5)').text();
    diciembre = fila.find('td:eq(6)').text();
    marzo = fila.find('td:eq(7)').text();
    nota_final = fila.find('td:eq(8)').text();



    $("#asiganturaLibreta").html(nombre);
    $("#nota1").val(nota1);
    $("#nota2").val(nota2);
    $("#nota3").val(nota3);
    $("#Integrador").val(integrador);
    $("#diciembre").val(diciembre);
    $("#marzo").val(marzo);
    $("#final").val(nota_final);


 
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Notas");            
    $("#modalCRUD_Libreta").modal("show");  
    
});

//botón BORRAR



$("#formPersonasLibreta").submit(function(e){
    e.preventDefault();    
 
    asiganturaLibreta = $.trim($("#asiganturaLibreta").html());
    nota1 = $.trim($("#nota1").val());
    nota2 = $.trim($("#nota2").val());
    nota3 = $.trim($("#nota3").val());
    Integrador = $.trim($("#Integrador").val());
    diciembre = $.trim($("#diciembre").val());
    marzo = $.trim($("#marzo").val());
    final = $.trim($("#final").val());



    console.log({id_libreta:id_libreta, nota1:nota1, nota2:nota2, nota3:nota3, Integrador:Integrador, diciembre:diciembre, marzo:marzo, final:final});
    $.ajax({
        url: "bd/crud_Notas_LibretaDigital.php",
        type: "POST",
        dataType: "json",
        data: {id_libreta:id_libreta, nota1:nota1, nota2:nota2, nota3:nota3, Integrador:Integrador, diciembre:diciembre, marzo:marzo, final:final},
        success: function(data){  
            console.log(data);
            id_libreta = data[0].id_libreta;            
        
            nota1 = data[0].nota1;
            nota2 = data[0].nota2;
            nota3 = data[0].nota3;
            integrador = data[0].integrador;
            diciembre = data[0].diciembre;
            marzo = data[0].marzo;
            nota_final = data[0].nota_final;
            
            tablaLibreta.row(fila).data([id_libreta,asiganturaLibreta,nota1,nota2,nota3,integrador,diciembre,marzo,nota_final]).draw();           
        }        
    });
    $("#modalCRUD_Libreta").modal("hide");    
    
});    

});

</script>




<?php  }} ?>



