<?php
 require 'conexion.php';
// Check connection
$NOMBRE = $_POST['nombre'];
$APELLIDO = $_POST['apellido'];
$CEDULA = $_POST['cedula'];
$TELEFONO = $_POST['telefono'];
$CLAVE = $_POST['clave'];
$DIRECCION = $_POST['direccion'];


try {
   
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "  INSERT INTO usuarios 
    (NOMBRE ,APELLIDO,CEDULA,TELEFONO,DIRECCION,CLAVE) 
    VALUES('$NOMBRE','$APELLIDO','$CEDULA','$TELEFONO','$DIRECCION','$CLAVE');";

    /*$sql = "INSERT INTO usuarios (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@example.com')";*/
    // use exec() because no results are returned
    $conn->exec($sql);
    //echo "Ingresado";
    header('Location:  register.php');

  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  //  header('Location:  prueba.html');
  }
  
  $conn = null;

  ?>