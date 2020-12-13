<div class="modal-body">

<div class="form-group">
<label for="planSele" class="col-form-label">Plan:</label>
                
<select class="form-control" id="planSele">

<option value="1">Seleccione un Plan</option>

 <?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT `idPlan`, `idInstitucion`, `nombre`, `numero` FROM `plan_datos`";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>



    <?php                            
    foreach($data as $dat) {                                                        
    ?>

    <option value="<?php echo $dat['idPlan'] ?>"><?php echo $dat['nombre'] ?></option>

    
          
     
    <?php
        }
    ?>  


</select>

</div> 

</div> 


    <script type="text/javascript">

    $("#planSele").change(function(){

      planSele= $('#planSele').val();

    
        $.ajax({
          type:"post",
          data:'planSele=' + planSele,
          url:'modulosCarga/elementos/seccionBuscarPlan.php',
          success:function(r){
          	
           $('#tablaInstitucional').load('modulosCarga/cargaAsignaturaDocente.php');
          }
        });



      });
  
  </script>

