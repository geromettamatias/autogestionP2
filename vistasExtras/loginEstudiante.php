
    <div class="px-lg-5 pt-lg-4 pb-3 p-4 w-100 mb-auto text-center"><!-- w-100  abarque todo el ancho--- mb-auto  centrar verticalmente-->
       <img src="logo_Bla.png" class="img-fluid img-logo mr-8" >
       

    </div>
    <div class="px-lg-5 py-lg-4 p-4 w-100 mb-auto align-self-center">
          <h1 class="font-weight-bold mb-4">Estudiante</h1>
                <form id="formEstudiante" class="mb-5">
                    <div class="mb-4">
                      <label for="dni" class="form-label font-weight-bold">DNI</label>
                      <input type="text" class="form-control bg-dark-x border-0" id="dni" aria-describedby="emailHelp" placeholder="Ingresa el numero de DNI">
                      </div>
                      <div class="mb-4">
                        <label for="cuil" class="form-label font-weight-bold">CUI</label>
                        <input type="password" class="form-control bg-dark-x border-0 mb-2" id="cuil" placeholder="Ingresa el numero de CUIL">
                        <a href="#" id="emailHelp" class="form-text text-muted text-decoration-none">¿No has podido ingresar? Envía un mensaje al Administrador</a>
                        
                      </div><!-- bg-dark-x border-0  utiliza un estilo y luego un borde 0 --- luego mb-2 distancia entre impu y el otro-->
                            <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
                          <!-- w-100 para que varque toda la pantalla el boton-->
                </form>
                <p class="font-weight-bold text-center text-muted">O inicia sesión con el perfil de</p>

                <div class="d-flex justity-content-around"><!-- cases de boostra para sentrar contenidos-->
                    <button id="btnAdmin" type="submit" class="btn btn-outline-light flex-grow-1 mr-2"><i class="fas fa-user-tie lead mr-2"></i></i> Administrador</button>
                    <button id="btnProfesor" type="submit" class="btn btn-outline-light flex-grow-1 ml-2"><i class="fas fa-user-tie lead mr-2"></i> </i>Profesor</button>

                    <!-- mr-2  derecha  ----   ml-2  izquierda              imagenes sacado de fondozo   agrege un estilo de boostra a las imagenes que es lead mr-2   separar texto (margen) y grande-->
    </div>

    </div>
    <div class="text-center px-lg-5 pt-lg-3 pb-lg-4 p-4 w-100 mt-auto">
          <p class="d-inline-block md-0"> ¿Ya visitaste el aula virtual escolar?</p> <a href="#" class="text-light font-weight-bold text-decoration-none">Haz clic</a>  

        <!-- centrar el texto   texte-center  --   y para colocar todo en la misma linea  utiliza otra clase en <p class="d-inline-block"> -->
    </div>
 
 <script type="text/javascript">
    
    $(document).ready(function() { 

        $('#btnAdmin').click(function(){
            $('#login').load("vistasExtras/loginAdmin.php"); 
         });
       
        $('#btnProfesor').click(function(){
            $('#login').load("vistasExtras/loginProfesor.php");
         });



        $('#formEstudiante').submit(function(e){
                 e.preventDefault();
                 var dni = $.trim($("#dni").val());    
                 var cuil =$.trim($("#cuil").val());    
                  
                 if(dni.length == "" || cuil == ""){
                    Swal.fire({
                        type:'warning',
                        title:'Debe ingresar un DNI y/o CUIL',
                    });
                    return false; 
                  }else{
                      $.ajax({
                         url:"bd/loginEstudiante.php",
                         type:"POST",
                         datatype: "json",
                         data: {dni:dni, cuil:cuil}, 
                         success:function(data){               
                             if(data == "null"){
                                 Swal.fire({
                                     type:'error',
                                     title:'DNI y/o CUIL incorrecta',
                                 });
                             }else{
                                 Swal.fire({
                                     type:'success',
                                     title:'¡Conexión exitosa!',
                                     confirmButtonColor:'#3085d6',
                                     confirmButtonText:'Ingresar'
                                 }).then((result) => {
                                     if(result.value){
                                         //window.location.href = "vistas/pag_inicio.php";
                                         window.location.href = "alumno/index.php";
                                     }
                                 })
                                 
                             }
                         }    
                      });
                  }     
              });





    });


 </script>
