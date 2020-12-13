$(document).ready(function(){


$('#mensajeAlumno').load('mensajes/mensajeBoton.php');
$('#mensajeProfesor').load('mensajes/mensajeBotonDocente.php');


     $("#datos_Institucion").click(function(){ 
            $('#buscarTablaInstitucional').html(''); 
            $('#tablaInstitucional').load('modulosCarga/datos_Institucion.php');
            $('#contenidoAyuda').html(''); 
            $('#buscarTablaInstitucional').show();
      });

    


     $("#datosPlanEstudios").click(function(){
        $('#buscarTablaInstitucional').html('');
        $('#contenidoAyuda').html(''); 
        $('#tablaInstitucional').load('modulosCarga/planEstudios.php');
        $('#buscarTablaInstitucional').show();
      });

      $("#asignaturasPlanEstudios").click(function(){
            $('#contenidoAyuda').html(''); 
            $('#buscarTablaInstitucional').load('modulosCarga/buscarAsignaturasPlan.php');
            estableserValores();
            $('#buscarTablaInstitucional').show();
      });

       $("#cargaAsignaturaDocente").click(function(){
            $('#contenidoAyuda').html(''); 
            $('#buscarTablaInstitucional').load('modulosCarga/cargaAsignaturaDocenteBuscar.php');
            estableserValores2();
            $('#buscarTablaInstitucional').show();
      });

      $("#cursos").click(function(){
            $('#contenidoAyuda').html(''); 
            $('#buscarTablaInstitucional').load('modulosCarga/buscarCursos.php');
            estableserValoresCurso();
            $('#buscarTablaInstitucional').show();
      });

    $("#cargaAlumno").click(function(){
        $('#contenidoAyuda').html(''); 
        $('#buscarTablaInstitucional').html('');
        $('#tablaInstitucional').load('modulosCarga/alumnos.php');
        $('#buscarTablaInstitucional').show();
        
    });

    $("#cargaDocente").click(function(){
        $('#contenidoAyuda').html(''); 
        $('#buscarTablaInstitucional').html('');
        $('#tablaInstitucional').load('modulosCarga/docente.php');
        $('#buscarTablaInstitucional').show();
        
    });

    $("#cargaUsuarios").click(function(){
        $('#contenidoAyuda').html(''); 
        $('#buscarTablaInstitucional').html('');
        $('#tablaInstitucional').load('usuarios/usuarioSistema.php');
        $('#buscarTablaInstitucional').show();
        
    });


    $("#inscripNota").click(function(){

        $('#buscarTablaInstitucional').load('modulosAdministracion/Inscrp_BuscarCursos.php');
        $('#buscarTablaInstitucional').show();
        estableserValoresIscrp();
    });


    $("#libretaDigital").click(function(){

        $('#buscarTablaInstitucional').load('modulosAdministracion/Inscrp_BuscarCursosLibretaDigital.php');
        
        estableserValoresLibreta();
        $('#buscarTablaInstitucional').show();
    });


    $("#analiticos").click(function(){
        $('#contenidoAyuda').html(''); 
        $('#buscarTablaInstitucional').html('');
        $('#tablaInstitucional').load('modulosAdministracion/alumnosAnalitico1.php');
        $('#buscarTablaInstitucional').show();
        
    });

    $("#directivoDatos").click(function(){
        $('#contenidoAyuda').html(''); 
        $('#buscarTablaInstitucional').html('');
        $('#tablaInstitucional').load('paginaPrincipal/datosDire.php');
        $('#buscarTablaInstitucional').show();
      
        
    });

     $("#novedades").click(function(){
        $('#contenidoAyuda').html(''); 
        $('#buscarTablaInstitucional').html('');
        $('#tablaInstitucional').load('paginaPrincipal/novedades.php');
        $('#buscarTablaInstitucional').show();
      
        
    });

      $("#historia").click(function(){
        $('#contenidoAyuda').html(''); 
        $('#buscarTablaInstitucional').html('');
        $('#tablaInstitucional').load('paginaPrincipal/historia.php');
        $('#buscarTablaInstitucional').show();
      
        
    });

       $("#circularProfe").click(function(){
        $('#contenidoAyuda').html(''); 
        $('#buscarTablaInstitucional').html('');
        $('#tablaInstitucional').load('anuncios/circulares.php');
        $('#buscarTablaInstitucional').show();
      
        
    });

       $("#anuncioAlumno").click(function(){
        $('#contenidoAyuda').html(''); 
        $('#buscarTablaInstitucional').html('');
        $('#tablaInstitucional').load('anunciosAlumnos/anunciosAlumno.php');
        $('#buscarTablaInstitucional').show();
     
        
    });

       $("#anuncioProfe").click(function(){
        $('#contenidoAyuda').html(''); 
        $('#buscarTablaInstitucional').html('');
        
        $('#tablaInstitucional').load('anunciosDocentes/anunciosDocentes.php');
        $('#buscarTablaInstitucional').show();
      
        
    });

    $("#logoutModalfINAL").click(function(){


    $(".modal-header").css("background-color", "#DC1738");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("¿Confirma salir y cerrar Sesión?");            
   
  }); 



});


function estableserValoresLibreta(){
  cursoSe= '0';
      
      
       $.ajax({
          type:"post",
          data:'cursoSe=' + cursoSe,
          url:'modulosAdministracion/elementos/seccionCursos.php',
          success:function(r){
          
            $('#tablaInstitucional').load('modulosAdministracion/Notas_TablaInscrp.php');
          
            $('#contenidoAyuda').html('');

          
          }
        });

}












function estableserValoresIscrp(){
  cursoSe= '0';
      
      
       $.ajax({
          type:"post",
          data:'cursoSe=' + cursoSe,
          url:'modulosAdministracion/elementos/seccionCursos.php',
          success:function(r){
          
            $('#tablaInstitucional').load('modulosAdministracion/Inscrip_TablaInscrp.php');
          
            $('#contenidoAyuda').load('modulosAdministracion/Inscrp_AlumnoTabla.php');

            $('#contenidoAyuda').hide();
          }
        });

}





 












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


function estableserValores2(){
 planSele= 1;

    
        $.ajax({
          type:"post",
          data:'planSele=' + planSele,
          url:'modulosCarga/elementos/seccionBuscarPlan.php',
          success:function(r){
          
           $('#tablaInstitucional').load('modulosCarga/cargaAsignaturaDocente.php');
          }
        });

}



