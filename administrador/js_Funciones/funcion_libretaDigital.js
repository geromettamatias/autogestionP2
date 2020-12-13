function botonNotas(idIns) {

		$.ajax({
		          type:"post",
		          data:'idIns=' + idIns,
		          url:'modulosAdministracion/elementos/seccionLibretaDigital.php',
		          success:function(r){
		          	
		          
		            $('#tablaInstitucional').load('modulosAdministracion/LibretaDigital.php');
		            $('#contenidoAyuda').html('');
		            $('#buscarTablaInstitucional').hide();
		          
		          }
		        });





	
          
}