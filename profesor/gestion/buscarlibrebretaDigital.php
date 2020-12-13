<div class="form-group">
<label for="planSeleC" class="col-form-label">Curso:</label>
<select class="form-control" id="cursoSeProfesor">
<option value="0">Seleccione una asignatura </option>

 <?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
session_start();
if (isset($_SESSION['s_usuarioProfesor'])){
$s_usuarioProfesor=$_SESSION['s_usuarioProfesor'];




$c3onsulta = "SELECT `idDocente`, `dni`, `nombre`, `domicilio`, `email`, `telefono`, `titulo`, `nregistro` FROM `datos_docentes` WHERE `dni`='$s_usuarioProfesor'";
$r3esultado = $conexion->prepare($c3onsulta);
$r3esultado->execute();
$data=$r3esultado->fetchAll(PDO::FETCH_ASSOC);

foreach($data as $dat) {
    $idDocente=$dat['idDocente'];
      }


$consulta = "SELECT `idAsig`, `idPlan`, `nombre`, `ciclo`, `idDocente` FROM `plan_datos_asignaturas` WHERE `idDocente`='$idDocente'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                         
foreach($data as $dat) { 


      $idAsig=$dat['idAsig'];
      $idPlan=$dat['idPlan'];
      $ciclo=$dat['ciclo'];
      $nombre=$dat['nombre'];


?>

<option value="<?php echo $idAsig ?>"><?php echo $nombre.'--'.$ciclo ?></option>

    
<?php
        }}
?>  

</select>
</div>














    <script type="text/javascript">

    $("#cursoSeProfesor").change(function(){

      cursoSeProfesor= $('#cursoSeProfesor').val();
      
      
       $.ajax({
          type:"post",
          data:'cursoSeProfesor=' + cursoSeProfesor,
          url:'gestion/seccionAsignatura.php',
          success:function(r){
          
            $('#tablaInstitucional').load('gestion/librebretaDigital.php');
          }
        });

      

      });

 
  </script>











<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD_Libreta_Docente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formPersonasLibretaFina">    
                         
            <div class="modal-body">
            
            
                <div class="form-group">
                <label for="nota1" class="col-form-label">Apellido y Nombre: </label>
                 <div id="asiganturaLibreta"></div>
                </div>               
                <div class="form-group">
                <label for="nota1" class="col-form-label">DNI: </label>
                 <div id="asiganturaLibretaDni"></div>
                </div>
               
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
      