
    <?php
session_start();

?>
<!DOCTYPE html>
<html lang="es" >
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Farmacia</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top" 
  >   
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div
          
            class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Bienvenido</a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">Inicio</a></li>                      
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="comprar.php">Comprar</a></li>
                        <li><a 
                        id="botonAdmin"
                        style = "visibility:    hidden"
                        class="btn btn-primary js-scroll-trigger"
                         style="margin:15px" href="admin.php">
						 Administrador
						 </a></li>
                        
                        <li
                    
                        ><a 
                        id="botonCerrarSesion"
                        style = "visibility: hidden;"
                        class="btn btn-primary js-scroll-trigger" 
                        style="margin:15px"
                         href="salir.php">Cerrar sesión
                        </a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--ff Masthead-->
        <header class="masthead">
            <div class="container d-flex h-100 align-items-center">
                <div class="mx-auto text-center">
                    <h1 class="mx-auto my-0 text-uppercase">Farmacias DS3</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">Rapidez, Seguridad y Comodidad</h2>
                    <a 
                    id="entrarB"
                    class="btn btn-primary js-scroll-trigger" href="loginFinal.php">ENTRAR</a>
                </div>
            </div>
        </header>
  
                
            </div>
        </section>
        
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container">
            Copyright © Primer Parcial 2020</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
    <?php


if (isset($_SESSION['user_id'])) :
    echo'<script type="text/javascript">

    document.getElementById("botonCerrarSesion").style.visibility = "visible";
    document.getElementById("entrarB").innerHTML ="COMPRAR";
    </script>';

    if ($_SESSION['rol']==1) :
        echo'<script type="text/javascript">

        document.getElementById("botonAdmin").style.visibility = "visible";
     
        </script>';

    endif;
   
?>
    <?php 

else:

    echo'<script type="text/javascript">


    document.getElementById("botonCerrarSesion").style.visibility = "hidden";
 
    </script>';
   


?>
<?php  endif;
 ?>
</html>
