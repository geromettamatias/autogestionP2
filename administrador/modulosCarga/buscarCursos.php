
<div class="form-group">


<label for="planSeleC" class="col-form-label">Plan:</label>
                
<select class="form-control" id="planSeleC">

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








                <label for="cursoSele" class="col-form-label">Corresponde al:</label>
                <select class="form-control" id="cursoSele">
                <option>Seleccione ciclo</option>
                <option>1° AÑO (1° AÑO B.C.)</option>
                <option>2° AÑO (2° AÑO B.C.)</option>
                <option>3° AÑO (1° AÑO S.C.)</option>
                <option>4° AÑO (2° AÑO S.C.)</option>
                <option>5° AÑO (3° AÑO S.C.)</option>
                <option>6° AÑO (4° AÑO S.C.)</option>
                <option>7° AÑO (5° AÑO S.C.)</option>
                <option>BLA I</option>
                <option>BLA II</option>
                <option>BLA III</option>
                <option>BLA II y III</option>
                </select>







                </div> 


    <script type="text/javascript">

    $("#cursoSele").change(function(){

      cursoSele= $('#cursoSele').val();
      planSeleC= $('#planSeleC').val();

      
       $.ajax({
          type:"post",
          data:'cursoSele=' + cursoSele+'&planSeleC=' + planSeleC,
          url:'modulosCarga/elementos/seccionCursos.php',
          success:function(r){
          
           $('#tablaInstitucional').load('modulosCarga/Curso.php');
          }
        });

      

      });

    $("#planSeleC").change(function(){

      cursoSele= $('#cursoSele').val();
      planSeleC= $('#planSeleC').val();

      
       $.ajax({
          type:"post",
          data:'cursoSele=' + cursoSele+'&planSeleC=' + planSeleC,
          url:'modulosCarga/elementos/seccionCursos.php',
          success:function(r){
          
           $('#tablaInstitucional').load('modulosCarga/Curso.php');
          }
        });

      
      });
  
  </script>

