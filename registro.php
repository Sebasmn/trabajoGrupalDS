<?php
 require 'conexion.php';
// Check connection
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
    (NOMBRE ,APELLIDO,CEDULA,'EMAIL',TELEFONO,DIRECCION,CLAVE) 
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

   
  header('Location:  comprar.php');


    //
    

  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  //  header('Location:  prueba.html');
  header('Location:  loginFinal.html');
  }
  
  $conn = null;

  ?>