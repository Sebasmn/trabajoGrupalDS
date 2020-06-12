<?php
 require 'conexion.php';
// Check connection
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location:  comprar.php');

}

//
$NOMBRE = $_POST['nombre'];
$APELLIDO = $_POST['apellido'];
$CEDULA = $_POST['cedula'];
$TELEFONO = $_POST['telefono'];
$CLAVE = $_POST['clave'];
$DIRECCION = $_POST['direccion'];
$EMAIL = $_POST['email'];

try {
   
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = $conn->prepare("  INSERT INTO usuarios 
    (NOMBRE ,APELLIDO,CEDULA,EMAIL,TELEFONO,DIRECCION,CLAVE) 
     VALUES(:NOMBRE,
    :APELLIDO,
    :CEDULA,
    :EMAIL,
    :TELEFONO,
    :DIRECCION,
    :CLAVE);"); 

$sql->execute([
  'NOMBRE' => $NOMBRE,
  'APELLIDO' =>$APELLIDO,
  'CEDULA' => $CEDULA,
  'EMAIL' =>$EMAIL,
  'TELEFONO' => $TELEFONO,
  'DIRECCION' => $DIRECCION,
  'CLAVE' =>$CLAVE,
]);
    $conn->exec($sql);
    $_SESSION['user_id'] = NOMBRE+ " "+APELLIDO;
    $usuario = $_SESSION['user_id'] ;
    echo "<script type='text/javascript'>alert('$usuario');</script>";

    //
    $_SESSION['user_id'] = $NOMBRE;
    $usuario = $_SESSION['user_id'] ;
    echo "<script type='text/javascript'>alert('$usuario');</script>";
   
      header('Location:  comprar.php');


    //
    

  } catch(PDOException $e) {
    echo $e->getMessage();
    $msg="Errores al ingresar, por favor revise e intente de nuevo.";
    echo "<script type='text/javascript'>
    
    alert('$msg');
    
    
    </script>";
  //  header('Location:  prueba.html');
  header('Location:  loginFinal.php');
  }
  
  $conn = null;

  ?>  