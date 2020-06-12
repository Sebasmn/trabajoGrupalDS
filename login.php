<?php 

    session_start();

    if (isset($_SESSION['user_id'])) {
        header('Location:  comprar.php');
   
    }

    require 'conexion.php'; 

    if (!empty($_POST['cedula']) && !empty($_POST['claveLog'])) {
        $records = $conn->prepare('SELECT * FROM usuarios WHERE CEDULA=:cedula');
        $records->bindParam(':cedula', $_POST['cedula']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';
        if (count($results) > 0 && $_POST['claveLog'] = $results['CLAVE']) {
            
            $_SESSION['user_id'] = $results['NOMBRE'];
            $usuario = $_SESSION['user_id'] ;
            echo "<script type='text/javascript'>alert('$usuario');</script>";

           
          header('Location:  comprar.php');
           // $message2 = "Bienvenido";
        } else {
            $message = 'Error al ingresar la cedula o la contraseña';
            echo "<script type='text/javascript'>alert('$message');</script>";
            //MOSTRA QUE NO HAY RESULTADOS
            header('Location:  loginFinal.php');
        }
    }else{
        $message = 'Campos vacios';
        
        
        $des = $_POST['cedula'];
        $asda = $_POST['claveLog'];
        echo "<script type='text/javascript'>alert('$des');</script>";
        echo "<script type='text/javascript'>alert('$asda');</script>";
        //MOSTRAR QUE HA COMETIDO ERRORES
    }
    
?> 