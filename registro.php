<?php
 require 'conexion.php';
// Check connection
session_start();
//session_destroy();
if (isset($_SESSION['user_id'])) {
    header('Location:  comprar.php');

}else{
$NOMBRE = $_POST['nombre'];
$APELLIDO = $_POST['apellido'];
$CEDULA = $_POST['cedula'];
$TELEFONO = $_POST['telefono'];
$CLAVE = $_POST['clave'];
$DIRECCIONLAT = $_POST['direccionLAT'];
$DIRECCIONLON = $_POST['direccionLON'];
$EMAIL = $_POST['email'];
//Comprobar usuarios existentes
  $records = $conn->prepare('SELECT * FROM usuarios WHERE CEDULA=:cedula');
        $records->bindParam(':cedula', $_POST['cedula']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        $message = '';
    if (count($results) == 1 ) {
    try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare("  INSERT INTO usuarios 
    (NOMBRE ,APELLIDO,CEDULA,EMAIL,TELEFONO,DIRECCIONLAT,
    DIRECCIONLON,CLAVE) 
     VALUES(:NOMBRE,
    :APELLIDO,
    :CEDULA,
    :EMAIL,
    :TELEFONO,
    :DIRECCIONLAT,
    :DIRECCIONLON,
    :CLAVE);"); 

$sql->execute([
  'NOMBRE' => $NOMBRE,
  'APELLIDO' =>$APELLIDO,
  'CEDULA' => $CEDULA,
  'EMAIL' =>$EMAIL,
  'TELEFONO' => $TELEFONO,
  'DIRECCIONLAT' => $DIRECCIONLAT,
  'DIRECCIONLON' => $DIRECCIONLON,
  'CLAVE' =>$CLAVE,
]);
    //$conn->exec($sql);
    $_SESSION['user_id'] = $NOMBRE;
    $usuario = $_SESSION['user_id'] ;
      header('Location:  comprar.php');
    
  } catch(PDOException $e) {
    echo $e->getMessage();
    $msg="Errores al ingresar, por favor revise e intente de nuevo.";
    echo "<script type='text/javascript'>
    
    alert('$msg');
    
    
    </script>";
  //  header('Location:  prueba.html');
header('Location:  loginFinal.php');
  }
}else{
    $alerta = "Usuario ya existe !";
    echo "<script type='text/javascript'>
    alert('$alerta');
    </script>";
  }

  $conn = null;
}

  ?>  