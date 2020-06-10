<?php
 require 'conexion.php';
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "INSERT INTO usuarios (NOMBRE, APELLIDO, CEDULA, TELEFONO, DIRECCION, CLAVE)
VALUES('$_POST['nom']',' $_POST['ape']','$_POST['ced']','$_POST['tel']','$_POST['dir']','$_POST['con']')";
if (!mysqli_query($conn,$sql))
{
die('Error: ' . mysqli_error($con));
}
echo "Thank you.";

mysqli_close($con);

require 'conexion.php';
  ?>