<?php 

    session_start();

    if (isset($_SESSION['user_id'])) {
        header('Location:  comprar.php');
   
    }

    require 'conexion.php'; 

    if (!empty($_POST['cedula']) && !empty($_POST['claveLog'])) {
        $records = $conn->prepare('SELECT * FROM usuarios 
        WHERE CEDULA=:cedula
        AND CLAVE=:clave');
        $records->bindParam(':cedula', $_POST['cedula']);
        $records->bindParam(':clave', $_POST['claveLog']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
     
    
        if ($results &&
          count($results) > 0 //&& $_POST['claveLog'] = $results['CLAVE']
          ) {
            
            $_SESSION['user_id'] = $results['NOMBRE'];
            $usuario = $_SESSION['user_id'] ;
            echo "<script type='text/javascript'>alert('$usuario');</script>";

           
          header('Location:  comprar.php');
           // $message2 = "Bienvenido";
        } else {
           
            echo "<script type='text/javascript'>
            
            
           if(!alert('Usuario no existe o contraseña incorrecta')){
            window.location.href = 'loginFinal.php';
           }
            
            
            
            </script>";
            //MOSTRA QUE NO HAY RESULTADOS
         //   header('Location:  loginFinal.php');
        }
    }else{
        $message = 'Campos vacios';
        //MOSTRAR QUE HA COMETIDO ERRORES
        echo "<script type='text/javascript'>
        
        if(!alert('Usuario no existe o contraseña incorrecta')){
            window.location.href = 'loginFinal.php';
           }
        
        </script>";
    }
    
?> 