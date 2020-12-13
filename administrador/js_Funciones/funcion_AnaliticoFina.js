function analiticosFinal(idAlumnos) {

  cadena="idAlumnos=" + idAlumnos;

  $.ajax({
    type:"POST",
    url:"modulosAdministracion/elementos/seccionAnalitico.php",
    data:cadena,
    success:function(r){
    
      $('#contenidoAyuda').html(''); 
      $('#buscarTablaInstitucional').load('modulosAdministracion/alumnosAnalitico2-Tabla.php');
      $('#tablaInstitucional').load('modulosAdministracion/alumnosAnalitico2.php');
      $('#buscarTablaInstitucional').show();
        

    }
  });


	

}





function analiticoFinal() {
	

	 idAnalitico = $("#idAnalitico").html();
  	 notas = $("#notas").val();

    console.log({notas:notas, idAnalitico:idAnalitico});

        cadena="notas=" + notas+
           "&idAnalitico=" + idAnalitico;



          $.ajax({
            type:"POST",
            url:"bd/crud_AnaliticoFinal.php",
            data:cadena,
            success:function(r){
               $('#tablaInstitucional').load('modulosAdministracion/alumnosAnalitico2.php');
                
            }
          });
          $("#modalCRUD_notas").modal("hide"); 

}