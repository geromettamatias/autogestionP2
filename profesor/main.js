$(document).ready(function(){


  anuncioDocente();
 

     $("#libretaDigitalDocente").click(function(){
        $('#contenidoAyuda').html(''); 
        $('#buscarTablaInstitucional').load('gestion/buscarlibrebretaDigital.php');
        $('#tablaInstitucional').html('');
   
        
    });


         $("#mensajeAdministrador").click(function(){
        $('#contenidoAyuda').html(''); 
        $('#buscarTablaInstitucional').html('');
        $('#tablaInstitucional').load('mensajeAlumnos/mensajeAdminAlProfesor.php');
   
        
    });

        $("#mensajeAlumno").click(function(){
        $('#contenidoAyuda').html(''); 
        $('#buscarTablaInstitucional').html('');
        $('#tablaInstitucional').load('mensajeAlumnos/mensajeAlumnosAlProfesor.php');
   
        
    });


        $("#circularesP").click(function(){
        $('#contenidoAyuda').html(''); 
        $('#buscarTablaInstitucional').html('');
        $('#tablaInstitucional').load('anuncios/circulares.php');
   
        
    });






        
    $("#logoutModalfINAL").click(function(){


    $(".modal-header").css("background-color", "#DC1738");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("¿Confirma salir y cerrar Sesión?");            
   
  }); 

});




function cerrarSeccionProfesor()
        {
            $.ajax({
                url:'../bd/logoutEstudianteProf.php',
                type:'POST',
                data:"mensaje=mensaje&boton=cerrar"
            }).done(function(resp){
                //alert(resp);
                window.location.href = "../index.php";
            });
        };




function anuncioDocente() {

   
  
        $.ajax({
        url: "bd/anuncioLeerDocente.php",
        type: "POST",
        dataType: "json",
        data: {},
        success: function(data){  
            console.log(data);

            info = data.anuncio.informe;
           

            
            $("#anunciosLeer").html(info);
            

                  
        }        
    });
}

