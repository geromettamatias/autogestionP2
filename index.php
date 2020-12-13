<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/65086dff65.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
     

    <title>E.E.T.16-AutoGestión</title>
  </head>
  <body class="bg-dark"> <!-- class="bg-dark" es una clase de boostras-->
   <section>
         <div class="row g-0"> <!-- g-0  no tenga fonder  seria que no se mueva-->
                <div class="col-lg-7 d-none d-lg-block">

                    <!-- carousel-->
                                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                <ol class="carousel-indicators">
                                  <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
                                  <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
                                
                                </ol>
                                <div class="carousel-inner">
                                  <div class="carousel-item img-1 min-vh-100 active">
                                   
                                    <div class="carousel-caption d-none d-md-block">
                                      <h5 class="font-weight-bold">Novedades Institucionales</h5>
                                      <a href="#" class="text-light font-weight-bold text-decoration-none" target="_blank">Visualización</a>
                                    </div>
                                  </div>
                                  <div class="carousel-item img-2 min-vh-100">
                                   
                                    <div class="carousel-caption d-none d-md-block">
                                      <h5 class="font-weight-bold">Datos de la Institución</h5>
                                      <a href="vistasExtras/datosInstitucional.php " class="text-light font-weight-bold text-decoration-none" target="_blank">Visualización</a>
                                    </div>
                                  </div>
                                
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Next</span>
                                </a>
                              </div>









                  
                </div>
                <div id="login" class="col-lg-5 d-flex flex-column align-items-end min-vh-100">
                    
                </div>  


         </div>
   </section>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  

    <script type="text/javascript">
    
    $(document).ready(function() { 

        $('#login').load("vistasExtras/loginAdmin.php");   
      

    });


 </script>


  </body>
</html>