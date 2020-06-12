<?php 

session_start();


if (isset($_SESSION['user_id'])) :
    # code...
 /*mOSTRAR BOTON DE  SALIDA AL COSTADO*/    
 
    echo'<script type="text/javascript">
   
    
 
    </script>';
   


?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pedidos Medicamentos</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a 
                id="status"
                class="navbar-brand js-scroll-trigger" 
                href="#page-top">
            
            
            </a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#projects">Projects</a></li>                        
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="comprar.php">Comprar</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#signup">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container d-flex h-100 align-items-center">
                <div class="mx-auto text-center">
                    <h1 class="mx-auto my-0 text-uppercase">Carrito de compras</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">Adquiere tus medicamentos de una manera rápida y eficiente.</h2>
                    <a class="btn btn-primary js-scroll-trigger" href="#about">Comprar</a>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="about-section text-center" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2 class="text-white mb-4">Poner aqui la tabla de compras</h2>
                        
                    </div>
                </div>
                <img class="img-fluid" src="assets/img/ipad.png" alt="" />
            </div>
        </section>
        <section class="contact-section bg-black" id="signup">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Establecimiento</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50">Universidad Técnica de Ambato</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Integrantes</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50"><a href="mailto:tucorreo@gmail.com">Alexander Conteron</a></div>
                                <div class="small text-black-50"><a href="mailto:sebasmayorga98@gmail.com">Sebastian Mayorga</a></div>
                                <div class="small text-black-50"><a href="mailto:francisclquishpe00@gmail.com">Javier Quishpe</a></div>
                                <div class="small text-black-50"><a href="mailto:rubiragene17@gmail.com">Génesis Rubira</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Celular</h4>
                                <hr class="my-4" />
                                <div class="small text-black-50">+593 987975631</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social d-flex justify-content-center">
                    <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a><a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a><a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container">Copyright © Trabajo Final 2020</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
    <?php else:  


echo'<script type="text/javascript">

    </script>';
     /*NO MOSTRAR BOTON DE  SALIDA AL COSTADO*/ 
     header('Location:  loginFinal.php');
?>


<?php endif; ?>

<?php 


if (isset($_SESSION['user_id'])) :
    # code...
 /*mOSTRAR BOTON DE  SALIDA AL COSTADO*/ 
 $usuario = $_SESSION['user_id'] ;
    echo'<script type="text/javascript">
  
    document.getElementById("status").innerHTML=
    "Sesion Abierta! "


    ;
 
    </script>';
   


?>
<?php endif; ?>
</html>
