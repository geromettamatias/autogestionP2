                 <div class="px-lg-5 pt-lg-4 pb-3 p-4 w-100 mb-auto text-center"><!-- w-100  abarque todo el ancho--- mb-auto  centrar verticalmente-->
       
                            <img src="logo_Bla.png" class="img-fluid img-logo mr-4" >
       
                            <button id="btnPartes"  class="btn btn-outline-light flex-grow-1 ml-4"> <i class="fas fa-file-powerpoint lead mr-2"></i></i>Partes</button>
                    </div>
                    <div class="px-lg-5 py-lg-4 p-4 w-100 mb-auto align-self-center">
                        <h1 class="font-weight-bold mb-4">Administrador</h1>
                        <form id="formLogin" class="mb-5">
                          <div class="mb-4">
                            <label for="usuario" class="form-label font-weight-bold">Usuario</label>
                            <input type="text" class="form-control bg-dark-x border-0" id="usuario" aria-describedby="emailHelp" placeholder="Ingresa tu usuario">
                            
                          </div>
                          <div class="mb-4">
                            <label for="password" class="form-label font-weight-bold">Contraseña</label>
                            <input type="password" class="form-control bg-dark-x border-0 mb-2" id="password" placeholder="Ingresa tu contraseña">
                            <a href="#" id="emailHelp" class="form-text text-muted text-decoration-none">¿Has olvidado tu contraseña?</a>
                          </div><!-- bg-dark-x border-0  utiliza un estilo y luego un borde 0 --- luego mb-2 distancia entre impu y el otro-->
                         
                            <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
                          <!-- w-100 para que varque toda la pantalla el boton-->
                        </form>

                            <p class="font-weight-bold text-center text-muted">O inicia sesión con el perfil de</p>

                        <div class="d-flex justity-content-around"><!-- cases de boostra para sentrar contenidos-->
                            <button id="btnProfesor"  class="btn btn-outline-light flex-grow-1 mr-2"><i class="fas fa-user-tie lead mr-2"></i></i> Profesor</button>
                            <button id="btnEstudiante"  class="btn btn-outline-light flex-grow-1 ml-2"><i class="fas fa-user-graduate lead mr-2"></i> </i>Estudiante</button>

                            <!-- mr-2  derecha  ----   ml-2  izquierda              imagenes sacado de fondozo   agrege un estilo de boostra a las imagenes que es lead mr-2   separar texto (margen) y grande-->
                        </div>

                    </div>
                        <div class="text-center px-lg-5 pt-lg-3 pb-lg-4 p-4 w-100 mt-auto">
                              <p class="d-inline-block md-0"> ¿Ya visitaste el aula virtual escolar?</p> <a href="#" class="text-light font-weight-bold text-decoration-none">Haz clic</a>  


                            <!-- centrar el texto   texte-center  --   y para colocar todo en la misma linea  utiliza otra clase en <p class="d-inline-block"> -->
                        </div>
                              

 <script type="text/javascript">
    
    $(document).ready(function() { 

    
        $('#btnEstudiante').click(function(){

            $('#login').load("vistasExtras/loginEstudiante.php");
         });
        $('#btnProfesor').click(function(){
            $('#login').load("vistasExtras/loginProfesor.php");
         });

        $('#btnPartes').click(function(){
    
            window.open('vistasExtras/partes.php', '_blank');
         });



            $('#formLogin').submit(function(e){
                   e.preventDefault();
                   var usuario = $.trim($("#usuario").val());    
                   var password =$.trim($("#password").val());    
                    
                   if(usuario.length == "" || password == ""){
                      Swal.fire({
                          type:'warning',
                          title:'Debe ingresar un usuario y/o password',
                      });
                      return false; 
                    }else{
                        $.ajax({
                           url:"bd/loginAdministrador.php",
                           type:"POST",
                           datatype: "json",
                           data: {usuario:usuario, password:password}, 
                           success:function(data){               
                               if(data == "null"){
                                   Swal.fire({
                                       type:'error',
                                       title:'Usuario y/o password incorrecta',
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
                                           window.location.href = "administrador/index.php";
                                       }
                                   })
                                   
                               }
                           }    
                        });
                    }     
                });



    });


 </script>