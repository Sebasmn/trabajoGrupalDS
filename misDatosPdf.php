
<?php 
        require 'conexion.php'; 
        session_start();
        if (isset($_SESSION['CED_CLIENTE'])) :
            $cedGlobal = $_SESSION['CED_CLIENTE'];
           /* echo "<script type='text/javascript'>
                alert('$cedGlobal');
            </script>";*/
        endif;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilofactura1.css">
</head>
<body>
<section id="padre">
            <div id="caja1"></div>

            <div id="caja2">
                <div id="titulo">
                    <p>FARMACIA DS3</p>
                </div>
            <br>
            
			<?php 
            $records = $conn->prepare("SELECT * FROM usuarios 
            WHERE   CEDULA = :cedula "   );
            $records->bindParam(':cedula', $cedGlobal);
            $records->execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);
            $cd = $results['ID'];         
        ?>
        
            <p style="margin-left: 39%;">NOMBRE : <?php echo $results['NOMBRE']?> </p>
            <p style="margin-left: 38%;">APELLIDO : <?php echo $results['APELLIDO']?></p>
            <p style="margin-left: 40%;">CEDULA : <?php echo $results['CEDULA']?></p>
            <P style="margin-left: 37%;">TELEFONO : <?php echo $results['TELEFONO']?></P>
			<P style="margin-left: 23%;">CORREO ELECTRONICO : <?php echo $results['email']?></P>
			<!--<hr color="blue" size=3> -->
			<hr color="#44A3A3">
			<!-- AQUI VA LA TABLA-->
			<br> 
			<hr color="#44A3A3">
			</div>
            
            
            
		 </section>
		 
				</div>
		</section>

         
            
</body>
</html>