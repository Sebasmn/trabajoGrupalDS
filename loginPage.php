<?php 

session_start();


if (!isset($_SESSION['user_id'])) :
    # code...
 
    echo'<script type="text/javascript">
    alert(" HAY SESION ");
 
    </script>';
   


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inicio Sesión</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <div class="login">
        <h1>Login</h1>
         <form action="login.php" method="post">
            <input type="text" name="usuario" placeholder="Usuario" required="required" />
            <input type="password" name="clave" placeholder="Contraseña" required="required" />
            <button type="submit" class="btn btn-primary btn-block btn-large">Iniciar Sesión</button>
            <button type="submit" class="btn btn-primary btn-block btn-large"><a href="registrarse.html">No tienes cuenta? Regístrate</a></button>
         
        </form>
    </div>
</body>

<?php else:  
   header('Location: index.html'); 
     echo'<script type="text/javascript">
     alert("NO SESION");
  
     </script>';
    ?>
    
   
    <?php endif; ?>
</html>