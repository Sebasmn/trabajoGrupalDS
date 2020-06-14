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
$CEDULA = $_POST['cedulaR'];
$TELEFONO = $_POST['telefono'];
$CLAVE = $_POST['claveR'];
$DIRECCIONLAT = $_POST['direccionLAT'];
$DIRECCIONLON = $_POST['direccionLON'];
$EMAIL = $_POST['email'];
//Comprobar usuarios existentes
  $records = $conn->prepare('SELECT * FROM usuarios
   WHERE CEDULA=:cedula');
        $records->bindParam(':cedula', $_POST['cedulaR']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
    if (
    //count($results['ID']) == 0  CAMBIAR MYSQL CONFIG PARA QUE VALGA
    !$results
    ) {
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


$ultimo =  $conn->lastInsertId();


    //$conn->exec($sql);
    $_SESSION['user_id'] = $NOMBRE;

    //
    $records = $conn->prepare('SELECT * FROM usuarios
      WHERE CEDULA=:cedula');
        $records->bindParam(':cedula', $_POST['cedulaR']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
    //
    $_SESSION['rol'] =$results['ROL'];
    $rol = $_SESSION['rol'];

    $_SESSION['CED_CLIENTE'] =$results['CEDULA'];
    $usuario = $_SESSION['user_id'] ;
   header('Location:  comprar.php');
    
  } catch(PDOException $e) {
    //echo $e->getMessage();
    $msg="Errores al ingresar, por favor revise e intente de nuevo.";
    echo "<script type='text/javascript'>
        
    if(!alert('$msg')){
        window.location.href = 'loginFinal.php';
       }
    
    </script>";
  }
}else{

    echo "<script type='text/javascript'>
        
    if(!alert('Usuario ya existe !')){
        window.location.href = 'loginFinal.php';
       }
    
    </script>";
  }

  $conn = null;
}

  ?>  