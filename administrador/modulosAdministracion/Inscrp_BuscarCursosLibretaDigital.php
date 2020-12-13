
<div class="form-group">


<label for="planSeleC" class="col-form-label">Curso:</label>
                
<select class="form-control" id="cursoSe">

<option value="0">Seleccione un Curso</option>

 <?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT `idCurso`, `idPlan`, `ciclo`, `nombre` FROM `curso`ORDER BY `idPlan`, `ciclo`, `nombre` ASC";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>



    <?php                            
    foreach($data as $dat) { 


      $idPlan=$dat['idPlan'];
      $idCurso=$dat['idCurso'];
      $ciclo=$dat['ciclo'];
      $nombre=$dat['nombre'];



              $consulta2 = "SELECT `idPlan`, `idInstitucion`, `nombre`, `numero` FROM `plan_datos` WHERE `idPlan`='$idPlan'";
                $resultado2 = $conexion->prepare($consulta2);
                $resultado2->execute();
                $d2ata=$resultado2->fetchAll(PDO::FETCH_ASSOC); 


                   foreach($d2ata as $d2at) { 

                      $plan=$d2at['nombre'];

                     }





    ?>

    <option value="<?php echo $idCurso ?>"><?php echo $plan.'--'.$ciclo.'--'.$nombre ?></option>

    
          
     
    <?php
        }
    ?>  


</select>






                </div>







<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD_cambioCurso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
                
            <div class="modal-body">
                

               
                <div class="form-group">

            
                <label for="planSeleC" class="col-form-label">Curso:</label>
                                
                <select class="form-control" id="cursoSeCambi">

                <option value="0">Seleccione un Curso</option>

                 <?php
                include_once '../bd/conexion.php';
                $objeto = new Conexion();
                $conexion = $objeto->Conectar();

                $consulta = "SELECT `idCurso`, `idPlan`, `ciclo`, `nombre` FROM `curso`ORDER BY `idPlan`, `ciclo`, `nombre` ASC";
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
                $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                ?>



                    <?php                            
                    foreach($data as $dat) { 


                      $idPlan=$dat['idPlan'];
                      $idCurso=$dat['idCurso'];
                      $ciclo=$dat['ciclo'];
                      $nombre=$dat['nombre'];



                              $consulta2 = "SELECT `idPlan`, `idInstitucion`, `nombre`, `numero` FROM `plan_datos` WHERE `idPlan`='$idPlan'";
                                $resultado2 = $conexion->prepare($consulta2);
                                $resultado2->execute();
                                $d2ata=$resultado2->fetchAll(PDO::FETCH_ASSOC); 


                                   foreach($d2ata as $d2at) { 

                                      $plan=$d2at['nombre'];

                                     }





                    ?>

                    <option value="<?php echo $idCurso ?>"><?php echo $plan.'--'.$ciclo.'--'.$nombre ?></option>

                    
                          
                     
                    <?php
                        }
                    ?>  


                </select>






                                </div> 
                                
                               

            </div>   
                               
            
            <div class="modal-footer">
                
                <button class="btn btn-success glyphicon glyphicon-pencil" onclick="cambioCursoTotal('')">Guardar</button>
            </div>
       
        </div>
    </div>
</div>  














    <script type="text/javascript">

    $("#cursoSe").change(function(){

      cursoSe= $('#cursoSe').val();
      
      
       $.ajax({
          type:"post",
          data:'cursoSe=' + cursoSe,
          url:'modulosAdministracion/elementos/seccionCursos.php',
          success:function(r){
          
            $('#tablaInstitucional').load('modulosAdministracion/Notas_TablaInscrp.php');
          }
        });

      

      });

 
  </script>
