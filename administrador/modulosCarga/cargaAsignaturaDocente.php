
<!--INICIO del cont principal-->
<div class="container">

 <?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
session_start();


if (isset($_SESSION['planSele'])){
$planSele=$_SESSION['planSele'];


if ($planSele!=1){



 
$consulta = "SELECT `idAsig`, `idPlan`, `nombre`, `ciclo`, `idDocente` FROM `plan_datos_asignaturas` WHERE `idPlan`='$planSele'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);


?>








    <button id="btnNuevo_Asignatura" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button><br><br> 

  
 
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaAsignnatura" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                         
                                <th>N°Asi</th> 
                        
                                <th>Ciclo</th> 
                                <th>Nombre</th> 
                                <th>Docente</th>                         
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                
                                <td><?php echo $dat['idAsig'] ?></td>
                               
                                <td><?php echo $dat['ciclo'] ?></td>
                                <td><?php echo $dat['nombre'] ?></td> 
                                <td><?php  

                                $idDocente=$dat['idDocente'];
                                $docente="";
                                $consulta2 = "SELECT `idDocente`, `dni`, `nombre`, `domicilio`, `email`, `telefono`, `titulo`, `nregistro` FROM `datos_docentes` WHERE `idDocente`='$idDocente'";
                                    $resultado2 = $conexion->prepare($consulta2);
                                    $resultado2->execute();
                                    $data2=$resultado2->fetchAll(PDO::FETCH_ASSOC);


                                foreach($data2 as $dat2) {
                                    $docente=$dat2['nombre'].'--'.$dat2['dni'];
                                }

                                echo $docente;
                                ?>
                                    





                                </td>
           
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
<div class="modal fade" id="modalCRUD_AsignaturaDoce" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
              <form id="formPersonasPlanAsignaturaDocente">  
            <div class="modal-body">
                
                
                <div class="form-group">
                
<select class="form-control" id="seleDocente">

<option value="0">Seleccione un Docente</option>

 <?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT `idDocente`, `dni`, `nombre`, `domicilio`, `email`, `telefono`, `titulo`, `nregistro` FROM `datos_docentes`";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>



    <?php                            
    foreach($data as $dat) {                                                        
    ?>

    <option value="<?php echo $dat['idDocente'] ?>"><?php echo $dat['nombre'] ?>--<?php echo $dat['dni'] ?></option>

    
          
     
    <?php
        }
    ?>  


</select>

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


    var tablaAsignnatura = $('#tablaAsignnatura').DataTable({ 

       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<button class='btn btn-primary btn_DocenteAsig'>Editar</button>"  
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
$(document).on("click", ".btn_DocenteAsig", function(){
    fila = $(this).closest("tr");

 
    idasigD = parseInt($(this).closest("tr").find('td:eq(0)').text());

   
     $.ajax({
        url: "bd/crud_inscripDocenteAsignatura.php",
        type: "POST",
        dataType: "json",
        data: {idasigD:idasigD},
        success: function(data){  
            console.log(data);
            idDocente = data[0].idDocente;            
            if (idDocente!='') {
                 $("#seleDocente").val(idDocente);
             }else{
                 $("#seleDocente").val('0');
             }        
           
            
        }        
    });

    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar nombre de la Asignatura");            
    $("#modalCRUD_AsignaturaDoce").modal("show");  
    
});



$("#formPersonasPlanAsignaturaDocente").submit(function(e){
    e.preventDefault();    
 
    seleDocente = $.trim($("#seleDocente").val());
 

    console.log({idasigD:idasigD, seleDocente:seleDocente});
    $.ajax({
        url: "bd/crud_asignarProfesor.php",
        type: "POST",
        dataType: "json",
        data: {idasigD:idasigD, seleDocente:seleDocente},
        success: function(data){  
            console.log(data);
            idAsig = data[0].idAsig;            
            nombreAsig = data[0].nombre;
            ciclo = data[0].ciclo;
            idDocente = data[0].idDocente;


                     $.ajax({
                        url: "bd/crud_ProfesorDatos.php",
                        type: "POST",
                        dataType: "json",
                        data: {idDocente:idDocente},
                        success: function(data){  
                            console.log(data);
                            nombre = data[0].nombre;            
                            dni = data[0].dni;
                            docente=nombre+'--'+dni;
                         

                            
                            tablaAsignnatura.row(fila).data([idAsig,ciclo,nombreAsig,docente]).draw();      
                        }        
                    });
       
         

                     
        }        
    });
    $("#modalCRUD_AsignaturaDoce").modal("hide");    
    
});    










    
});

</script>




<?php  }} ?>




