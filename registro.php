<?php
require 'conexion.php'; 
try {
    $sql = "INSERT INTO usuarios (NOMBRE, APELLIDO, CEDULA, TELEFONO, DIRECCION, CLAVE)
    VALUES ('$_GET['nom']', '$_GET['ape']', '$_GET['ced']', '$_GET['tel']', '$_GET['dir']', '$_GET['con']')";
    // use exec() because no results are returned
    if (mysqli_query($conn, $sql)) {
      echo "Grabado exitoso";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
  
  $conn = null;
  ?>