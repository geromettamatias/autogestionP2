$(document).ready(function(){

    anuncioAlumno();

    $("#analiticoAlumno").click(function(){
        $('#contenidoAyuda').html(''); 
        $('#buscarTablaInstitucional').html('');
        $('#tablaInstitucional').load('gestion/analitico.php');
   
        
    });

     $("#libretaDigitalAlumno").click(function(){
        $('#contenidoAyuda').html(''); 
        $('#buscarTablaInstitucional').html('');
        $('#tablaInstitucional').load('gestion/libretaDigital.php');
   
        
    });

       $("#mensajeAdministrador").click(function(){
        $('#contenidoAyuda').html(''); 
        $('#buscarTablaInstitucional').html('');
        $('#tablaInstitucional').load('gestion/mensajeAdministrador.php');
   
        
    });

        $("#mensajeDocente").click(function(){
        $('#contenidoAyuda').html(''); 
        $('#buscarTablaInstitucional').html('');
        $('#tablaInstitucional').load('gestion/mensajeDocente.php');
   
        
    });


         $("#AnunciosAlumno").click(function(){
        $('#contenidoAyuda').html(''); 
        $('#buscarTablaInstitucional').html('');
        $('#tablaInstitucional').load('anunciosAlumnos/anuncioAlu.php');
   
        
    });


     


          $("#logoutModalfINAL").click(function(){


    $(".modal-header").css("background-color", "#DC1738");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("¿Confirma salir y cerrar Sesión?");            
   
  }); 


});









function estableserValoresCurso(){
 
      cursoSele= 'Seleccione ciclo';
      planSeleC= 'Seleccione un Plan';

     
       $.ajax({
          type:"post",
          data:'cursoSele=' + cursoSele+'&planSeleC=' + planSeleC,
          url:'modulosCarga/elementos/seccionCursos.php',
          success:function(r){
          
           $('#tablaInstitucional').load('modulosCarga/curso.php');
          }
        });

       


}

function estableserValores(){
 planSele= 1;

    
        $.ajax({
          type:"post",
          data:'planSele=' + planSele,
          url:'modulosCarga/elementos/seccionBuscarPlan.php',
          success:function(r){
          
           $('#tablaInstitucional').load('modulosCarga/asignaturasPlan.php');
          }
        });

}




function cerrarSeccion()
        {
            $.ajax({
                url:'../bd/loginEstudiante.php',
                type:'POST',
                data:"mensaje=mensaje&boton=cerrar"
            }).done(function(resp){
                //alert(resp);
                window.location.href = "../index.php";
            });
        };


function anuncioAlumno() {

   
  
        $.ajax({
        url: "bd/anuncioLeerAlumno.php",
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
