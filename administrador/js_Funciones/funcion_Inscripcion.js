function botonInscripcion() {
  $("#contenidoAyuda").toggle();	

}



function botonInscribir(datos) {
 
  cursoSe = $("#cursoSe").val();
 
d=datos.split('||');
idAlumnos=d[0];
idPlanEstudio=d[1];



    $.ajax({
        url: "bd/crud_inscripcionComparacion.php",
        type: "POST",
        dataType: "json",
        data: {idPlanEstudio:idPlanEstudio,  cursoSe:cursoSe},
        success: function(data){  
            if (data==1) {
              botonInscribirFinalP(idAlumnos,cursoSe);
            }else{

              Swal.fire({
                        icon: 'error',
                        title: 'Administrador dice:',
                        text: 'El alumno no puede matricular en este curso porque no corresponde la orientación !',
                        footer: '<a href>Why do I have this issue?</a>'
                      })
              
            }
            
            
            }   
    });



}



function botonInscribirFinalP(idAlumnos,cursoSe) {
 
 cadena="idAlumnos=" + idAlumnos;

  $.ajax({
    type:"POST",
    url:"bd/crud_inscripcionComparacionCopia.php",
    data:cadena,
    success:function(r){

      if (r==0) {
        botonInscribirFinal(idAlumnos,cursoSe);
      }else{

        Swal.fire({
                        icon: 'error',
                        title: 'Administrador dice:',
                        text: 'El alumno no puede matricular en este curso porque esta inscripto en '+r,
                        footer: '<a href>Why do I have this issue?</a>'
                      });

      }

    
    }
  });




}









function botonInscribirFinal(idAlumnos,cursoSe) {
 
  idIns = null; 
  opcion=1;


  console.log({idAlumnos:idAlumnos, cursoSe:cursoSe,  idIns:idIns, opcion:opcion});


    $.ajax({
        url: "bd/crud_inscripcion.php",
        type: "POST",
        dataType: "json",
        data: {idAlumnos:idAlumnos, cursoSe:cursoSe,  idIns:idIns, opcion:opcion},
        success: function(data){  
            console.log(data);
            idIns = data[0].idIns;    
            idCurso = data[0].idCurso;
            idAlumno = data[0].idAlumno;

            inscribirMaterias(idIns,idCurso,idAlumno);

            
            }   
    });




Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Se actualizo los registros',
                            showConfirmButton: false,
                            timer: 500
                          });



 $('#tablaInstitucional').html('');
$('#tablaInstitucional').load('modulosAdministracion/Inscrip_TablaInscrp.php');
             




}






function botonMuchosPregunta(Datos) {

   var respuesta = confirm("¿Está seguro de editar o eliminar?");
    if(respuesta){
         
         botonMuchos(Datos);


         
            
    
    } 



   
}


function botonMuchos(Datos) {


if (Datos==1) {
  var checkedBox = $.map($('input:checkbox:checked'), 
                         function(val, i) {
                            return val.value;
                         });

conta=checkedBox.length;
idIns="";
 for (let i in checkedBox){
    
  
  idIns = checkedBox[i];
  cursoSe = $("#cursoSe").val();
  idAlumnos=null;
  opcion=2;


  console.log({idAlumnos:idAlumnos, cursoSe:cursoSe,  idIns:idIns, opcion:opcion});
 
  inscribirMateriasEliminar(idIns); 
    $.ajax({
        url: "bd/crud_inscripcion.php",
        type: "POST",
        dataType: "json",
        data: {idAlumnos:idAlumnos, cursoSe:cursoSe,  idIns:idIns, opcion:opcion},
        success: function(data){  
                    
        }   
    });

}


Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Se actualizo los registros',
                            showConfirmButton: false,
                            timer: 500
                          });



 $('#tablaInstitucional').html('');
$('#tablaInstitucional').load('modulosAdministracion/Inscrip_TablaInscrp.php');
             


}else{




 cambioCurso();


}


}



function cambioCurso(idIns) {

   

    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nueva Curso");            
    $("#modalCRUD_cambioCurso").modal("show"); 


}


function cambioCursoTotalttt() {


  cursoSe = $("#cursoSeCambi").val();

if (cursoSe!='0') {
   

$("#modalCRUD_cambioCurso").modal("hide");
 
var checkedBox = $.map($('input:checkbox:checked'), 
                         function(val, i) {
                            return val.value;
                         });

idIns="";
idIns = checkedBox[0];


        cadena="idIns=" + idIns + "&cursoSe=" + cursoSe;

  $.ajax({
    type:"POST",
    url:"bd/crud_inscripcionComparacionInlega.php",
    data:cadena,
    success:function(r){ 
          
              if (r==0) {
                cambioCursoTotal();
              }else{
                Swal.fire({
                        icon: 'error',
                        title: 'Administrador dice:',
                        text: 'El alumno no puede matricular en este curso porque no corresponde a la orienciación',
                        footer: '<a href>Why do I have this issue?</a>'
                      });

              }

             }
        });



}


}


function cambioCursoTotal() {


cursoSe = $("#cursoSeCambi").val();

if (cursoSe!='0') {
   

$("#modalCRUD_cambioCurso").modal("hide");
 
var checkedBox = $.map($('input:checkbox:checked'), 
                         function(val, i) {
                            return val.value;
                         });

conta=checkedBox.length;
idIns="";
for (let i in checkedBox){
    
  idIns = checkedBox[i];
  


 idAlumnos=null;
opcion=3;

  console.log({idAlumnos:idAlumnos, cursoSe:cursoSe,  idIns:idIns, opcion:opcion});
   inscribirMateriasEditar(idIns,cursoSe);

        $.ajax({
            url: "bd/crud_inscripcion.php",
            type: "POST",
            dataType: "json",
            data: {idAlumnos:idAlumnos, cursoSe:cursoSe,  idIns:idIns, opcion:opcion},
            success: function(data){ 


             }
        });
        
 }  

Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Se actualizo los registros',
                            showConfirmButton: false,
                            timer: 500
                          });


$('#tablaInstitucional').load('modulosAdministracion/Inscrip_TablaInscrp.php');



}



 $('#tablaInstitucional').html('');
$('#tablaInstitucional').load('modulosAdministracion/Inscrip_TablaInscrp.php');
             


}



function  inscribirMaterias(idIns,idCurso,idAlumno) {
 


    $.ajax({
        url: "bd/crud_inscripcion_LibretaDigital.php",
        type: "POST",
        dataType: "json",
        data: {idAlumno:idAlumno, idCurso:idCurso,  idIns:idIns},
        success: function(data){ 



                     
           
            }   
    });


}

function  inscribirMateriasEditar(idIns,cursoSe) {
 


    $.ajax({
        url: "bd/crud_inscripcion_LibretaDigitalEditar.php",
        type: "POST",
        dataType: "json",
        data: {cursoSe:cursoSe,  idIns:idIns},
        success: function(cursoSe){  
                     
           
            }   
    });


}






function  inscribirMateriasEliminar(idIns) {
 


    $.ajax({
        url: "bd/crud_inscripcion_LibretaDigitalEliminar.php",
        type: "POST",
        dataType: "json",
        data: {idIns:idIns},
        success: function(data){  
                     
           
            }   
    });


}