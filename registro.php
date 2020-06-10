<?php
require 'conexion.php'; 
try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO usuarios (NOMBRE, APELLIDO, CEDULA, TELEFONO, DIRECCION, CLAVE)
    VALUES ($_GET['nom'], $_GET['ape'], $_GET['ced'], $_GET['tel'], $_GET['dir'], $_GET['con'])";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Guardado satisfactorio";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  
  $conn = null;
  ?>