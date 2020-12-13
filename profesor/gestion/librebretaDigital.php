
<!--INICIO del cont principal-->
<div class="container">


<br><br>
 <?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
session_start();


if (isset($_SESSION['cursoSeProfesor'])){
$cursoSeProfesor=$_SESSION['cursoSeProfesor'];


 
$consulta = "SELECT `id_libreta`, `idIns`, `idAsig`, `nota1`, `nota2`, `nota3`, `integrador`, `diciembre`, `marzo`, `nota_final` FROM `libreta_digital` WHERE  `idAsig`='$cursoSeProfesor'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);







?>



 
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaLibreta" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                                       
                                <th>ID</th>
                                <th>Apellido y Nombre</th>
                                <th>DNI</th>
                                <th>N°1</th> 
                                <th>N°2</th>
                                <th>N°3</th>
                                <th>N°I</th>
                                <th>N°D</th> 
                                <th>N°M</th>
                                <th>N°F</th>                          
                                <th>Acción</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {
                           
                            $idIns=$dat['idIns'];
                            $nota1=$dat['nota1'];
                            $nota2=$dat['nota2'];
                            $nota3=$dat['nota3'];
                            $integrador=$dat['integrador'];
                            $diciembre=$dat['diciembre'];
                            $marzo=$dat['marzo'];
                            $nota_final=$dat['nota_final']; 
                            $id_libretaF=$dat['id_libreta'];

                                $consulta = "SELECT `idIns`, `idCurso`, `idAlumno` FROM `inscrip_curso_alumno` WHERE `idIns`='$idIns'";
                                $resultado = $conexion->prepare($consulta);
                                $resultado->execute();
                                $d1ata=$resultado->fetchAll(PDO::FETCH_ASSOC);

                                foreach($d1ata as $d1at) {

                                 $idAlumno=$d1at['idAlumno'];



                                            $consulta = "SELECT `idAlumnos`, `nombreAlumnos`, `dniAlumnos`, `cuilAlumnos`, `domicilioAlumnos`, `emailAlumnos`, `telefonoAlumnos`, `discapasidadAlumnos`, `nombreTutor`, `dniTutor`, `TelefonoTutor`, `idPlanEstudio` FROM `datosalumnos` WHERE `idAlumnos`='$idAlumno'";
                                            $resultado = $conexion->prepare($consulta);
                                            $resultado->execute();
                                            $d2ata=$resultado->fetchAll(PDO::FETCH_ASSOC);

                                            foreach($d2ata as $d2at) {

                                             $nombreAlumnos=$d2at['nombreAlumnos'];
                                             $dniAlumnos=$d2at['dniAlumnos'];
                                            

                                             }
                                

                                 }

               

                            ?>
                            <tr>

                         
                                <td><?php echo $id_libretaF; ?></td>
                                <td><?php echo $nombreAlumnos; ?></td>
                                <td><?php echo $dniAlumnos; ?></td>
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
      

   
  
</div>


 <script type="text/javascript">
$(document).ready(function(){


    var tablaLibreta = $('#tablaLibreta').DataTable({ 

    
    "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<button class='btn btn-primary modalCRUD_Libreta_Docentefi'>Editar</button>"  
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






var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".modalCRUD_Libreta_Docentefi", function(){
    fila = $(this).closest("tr");


    id_libreta = parseInt(fila.find('td:eq(0)').text());

       nombre = fila.find('td:eq(1)').text();
    dni = fila.find('td:eq(2)').text();
    nota1 = fila.find('td:eq(3)').text();
    nota2 = fila.find('td:eq(4)').text();
    nota3 = fila.find('td:eq(5)').text();
    integrador = fila.find('td:eq(6)').text();
    diciembre = fila.find('td:eq(7)').text();
    marzo = fila.find('td:eq(8)').text();
    nota_final = fila.find('td:eq(9)').text();


    $("#id").val(id_libreta);
    $("#asiganturaLibreta").html(nombre);
    $("#asiganturaLibretaDni").html(dni);
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
    $("#modalCRUD_Libreta_Docente").modal("show");  
    
});






$("#formPersonasLibretaFina").submit(function(e){
    e.preventDefault();    
 
 
    asiganturaLibreta = $.trim($("#asiganturaLibreta").html());
    asiganturaLibretaDni = $.trim($("#asiganturaLibretaDni").html());
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
            
            tablaLibreta.row(fila).data([id_libreta,asiganturaLibreta,asiganturaLibretaDni,nota1,nota2,nota3,integrador,diciembre,marzo,nota_final]).draw();           
        }        
    });
    $("#modalCRUD_Libreta_Docente").modal("hide");    
    
});    









  

});

</script>



   <?php
                                }
                            ?> 
