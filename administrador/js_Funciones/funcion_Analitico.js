function analitico(idAlumnos,idPlanEstudio,opcion) {
   

	cadena="idAlumnos=" + idAlumnos+
		   "&idPlanEstudio=" + idPlanEstudio+
		   "&opcion=" + opcion;



  $.ajax({
    type:"POST",
    url:"bd/crud_AnaliticoAlumnoTable.php",
    data:cadena,
    success:function(r){
    	
    }
  });



}


function analiticos(idAlumnos) {
  alert(idAlumnos);
}