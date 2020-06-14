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
    
        //$c=count($results['ID']);
   
     
       
        if ($results
         //&& $_POST['claveLog'] = $results['CLAVE']
          ) {
            $_SESSION['rol'] =$results['ROL'];
            $_SESSION['CED_CLIENTE'] =$results['CEDULA'];
            $rol =   $_SESSION['rol'] ;
            $_SESSION['user_id'] = $results['NOMBRE'];
            $usuario = $_SESSION['user_id'] ;
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
       // $message = 'Campos vacios';
        //MOSTRAR QUE HA COMETIDO ERRORES
       
        // header('Location:  loginFinal.php');
        if (isset($_SESSION['user_id'])) {
            header('Location:  loginFinal.php');
       
        }else{
           if(!$_POST['cedula']){
            header('Location:  loginFinal.php');
        
        }else{
        echo "<script type='text/javascript'>

        if(!alert('Usuario no existe o contraseña incorrecta')){
            window.location.href = 'loginFinal.php';
           }
        
        </script>";
        }
    }
    }
    
?> 