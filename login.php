<?php 

    session_start();

    if (isset($_SESSION['user_id'])) {
        header('Location: index.html');
   
    }

    require 'conexion.php'; 

    if (!empty($_POST['usuario']) && !empty($_POST['clave'])) {
        $message = "Ingresando";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $records = $conn->prepare('SELECT * FROM usuarios WHERE NOMBRE=:usuario');
        $records->bindParam(':usuario', $_POST['usuario']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';
        if (count($results) > 0 && $_POST['clave'] = $results['CLAVE']) {
            
            $_SESSION['user_id'] = $results['usuario'];



          
            header('Location: /munozquispe');
            header('Location:  comprar.html');
           // $message2 = "Bienvenido";
        } else {
            $message = 'Error al ingresar la cedula o la contraseña';
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
    
?> 