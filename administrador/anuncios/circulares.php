<div class="col-sm-12">
 
 <?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
session_start();


 
$consulta = "SELECT `id_circular`, `numero`, `url`, `type` FROM `circular`";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);


?>

    <h2><p style="color:#F4F6F6;"><mark>CIRCULARES</mark></p></h2> 

<br>


 <input type="text" id="servidor" value="<?php echo $_SERVER['HTTP_HOST']; ?>"  hidden="">


<button type="button" class="btn btn-primary btn-lg btn-block" data-dismiss="modal" id="btnNuevo_Circular">NUEVA CIRCULAR</button><br><br>


    <h4><p style="color:#F4F6F6;"><mark>PLANILLA DE CIRCULARES</mark></p></h4> 
<div class="table-responsive">        
  <table id="circularTabla" class="table table-striped table-bordered" cellspacing="0" width="100%">

                        <thead>
                            <tr> 
                                                  
                                <th scope="col">N°-ID</th>
                                <th scope="col">N° Disposición</th>
                                <th scope="col">BOTONES</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                           <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            
                                <tr>
                                    <td><?php echo $dat['id_circular'] ?></td>
                                    <td><?php echo $dat['numero'] ?></td>
                             
                                    <td></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
  </div>
 </div>



 <!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD_Circular" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formCircular">    
                         
            <div class="modal-body">




                                  <div class="input-group input-group-sm mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">N° Disposición:</span></div>

                                    <input id="numero" name="numero" type="text" class="form-control" title="numero"  placeholder="Ej: 328/20">
                                  </div>


                       

                                <div class="input-group input-group-sm mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><img style="width: 30px;" src="anuncios/pdf1.png" class="card-img-top" id="mostrarimagen"> Archivo:</span></div>


                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="seleccionararchivo" name="seleccionararchivo" lang="es" accept="application/pdf" title="Solo formato PDF" >

                                      <label class="custom-file-label" for="seleccionararchivo"> Ej: Circular.pdf</label>
                                    </div>

                                    <br><br>


                                           <div class="input-group input-group-sm mb-3">
                                  <div class="input-group-prepend">
                                   

                                    <dir id="informvarT"></dir>

                                  </div>


                                    
                                  </div>





                              
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
      
 






      <div class="modal fade" id="modalPdf" tabindex="-1" aria-labelledby="modalPdf" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-titleVisor" id="exampleModalLabel">Ver archivo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe id="iframePDF" frameborder="0" scrolling="no" width="100%" height="500px"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    </div>
                </div>
            </div>
        </div>



  <script type="text/javascript">
   $(document).ready(function() {    
    var circularTabla = $('#circularTabla').DataTable({ 

          
      
    "columnDefs":[{
       
        "targets": -1,
        "data":null,
        "defaultContent": "<button class='btn btn-danger btnBorrar_mensajeAdmin'>Borrar</button> <button class='btn btn-info btnVisor_pdf'>Visor-PDF</button> <button class='btn btn-info btnReVisor_pdf'>Re-Visor-PDF</button>",


       },

      

       ],


        
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




document.getElementById("seleccionararchivo").addEventListener("change", () => {
           

            // selecionamos la imagen
            var imagenPrevisualizacion = document.querySelector("#mostrarimagen");

            //  verificamos que sea PDF
            var archivoInput=document.getElementById("seleccionararchivo");
            var archivoRuta = archivoInput.value;
            var extPermitidas= /(.pdf)$/i;

            if (!extPermitidas.exec(archivoRuta)) {
                Swal.fire('Mensaje De Advertencia',"Solo se puede subir documentos PDF","warning");
                 imagenPrevisualizacion.src = "anuncios/pdf1.png";
                 $('#informvarT').html('');

                 $('#seleccionararchivo').val("");

            }else{
            // 
            
            archivo = $("#seleccionararchivo").val();
            $('#informvarT').html("Dirección: "+archivo);
            imagenPrevisualizacion.src = 'anuncios/pdf.png';


            }
        });



//  visor

var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnVisor_pdf", function(){
    fila = $(this).closest("tr");

 
    id_circular = parseInt(fila.find('td:eq(0)').text());

          $.ajax({
                        url: "bd/circularesLeerVisor.php",
                        type: "POST",
                        dataType: "json",
                        data: {id_circular:id_circular},
                        success: function(data){  
                      
                            url = data[0].url;
                         

                                  servidor=$("#servidor").val();

                                  vari= 'http://'+servidor+'/sist/administrador/anuncios/pdfCirculares/'+url;

                               

 
                    $(".modal-header").css("background-color", "#4e73df");
                    $(".modal-header").css("color", "white");  
                    $("#modalPdf").modal("show");
                    $('#iframePDF').attr('src',vari);

                            


                            
                        }        
                    });




 
    
});



$(document).on("click", ".btnReVisor_pdf", function(){
    fila = $(this).closest("tr");
    id_circular = parseInt(fila.find('td:eq(0)').text());

          $.ajax({
                        url: "bd/circularesLeerVisor.php",
                        type: "POST",
                        dataType: "json",
                        data: {id_circular:id_circular},
                        success: function(data){  
                      
                                  url = data[0].url;
                         

                                  servidor=$("#servidor").val();

                                  vari= 'http://'+servidor+'/sist/administrador/anuncios/pdfCirculares/'+url;

                                  window.open(vari, '_blank');
                            


                            
                        }        
                    });




 
    
});








// fin del visor


// eliminar





$(document).on("click", ".btnBorrar_mensajeAdmin", function(){    
    fila = $(this);
    
    id_circular = parseInt($(this).closest("tr").find('td:eq(0)').text());
 
    eliminarCircular(id_circular);
  
});
    




function eliminarCircular(id_circular,fila) {

  

Swal.fire({
  title: 'Esta seguro de eliminar este registro?',
  text: "Los datos eliminados no se podran recuperar!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'SI, eliminar este registro!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Operación éxitosa',
      'success'
    )

    eliminarCircularF(id_circular);
  }
})



      
     
}


function  eliminarCircularF(id_circular){


    var respuesta = confirm("¿Está seguro de eliminar este registro?");
    if(respuesta){

        console.log(id_circular);
        
        $.ajax({
            url: "bd/circularesEliminar.php",
            type: "POST",
            dataType: "json",
            data: {id_circular:id_circular},
            success: function(){
               
            }
        });

        
        circularTabla.row(fila.parents('tr')).remove().draw();
        
        Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Your work has been saved',
                  showConfirmButton: false,
                  timer: 500
                })
    } 
}




//


$("#btnNuevo_Circular").click(function(){

    
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Ingresar la nueva circular");            
    $("#modalCRUD_Circular").modal("show"); 
    
    
}); 




    $("#formCircular").submit(function(e){
    e.preventDefault();   

       var numero = $("#numero").val();
       var archivo = $("#seleccionararchivo").val();


            var formData= new FormData();
            var pdf = $("#seleccionararchivo")[0].files[0];





            formData.append('pdf',pdf);
            formData.append('numero',numero);

       
            $.ajax({
                url:'bd/circulares.php',
                type:'post',
                data:formData,
                contentType:false,
                processData:false,
                success: function(respuesta){

                    if (respuesta!=0) {

                        $.ajax({
                        url: "bd/circularesLeer.php",
                        type: "POST",
                        dataType: "json",
                        data: {numero:numero},
                        success: function(data){  
                          
                                
                            id_circular = data[0].id_circular;          
                            numero = data[0].numero;
                        
                            console.log(id_circular);
                             console.log(numero); 
                           
                            
                                  $("#numero").val("");
                                  $('#informvarT').html('');

                                  var imagenPrevisualizacion = document.querySelector("#mostrarimagen");

                                  imagenPrevisualizacion.src = 'anuncios/pdf1.png';

                                circularTabla.row.add([id_circular,numero]).draw();


                            
                        }        
                    });
                    }else{
                        alert("Error");
                    }

                     




              

                }
            });

       
   
    $("#modalCRUD_Circular").modal("hide");    
    
});    

});    


function openModelPDF(url) {

                                
  $('#iframePDF').attr('src',url);
 }



 </script>




