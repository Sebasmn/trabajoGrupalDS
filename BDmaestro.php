    <?php 	



     require 'conexion.php'; 
     session_start();
     //NO TE OLVIDARAS LA DIREC
     if (isset($_SESSION['CED_CLIENTE'])) :
         $cedGlobal = $_SESSION['CED_CLIENTE'];
         echo "<script type='text/javascript'>
             alert('$cedGlobal');
         </script>";
     endif;
            $records = $conn->prepare("SELECT * FROM usuarios 
            WHERE   CEDULA = :cedula "   );
            $records->bindParam(':cedula', $cedGlobal);
            $records->execute();
            $results = $records->fetch(PDO::FETCH_ASSOC);
            $cd = $results['ID'];         
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql = $conn->prepare("INSERT INTO maestrofactura 
			(FECHA,IDCLIENTE,DIRECCIONLAT,
			DIRECCIONLON) 
			 VALUES(:FECHA,
			:IDCLIENTE,
			:DIRECCIONLAT,
			:DIRECCIONLON);"); 
		
		$sql->execute([
		  'FECHA' => '1999/1/1',
		  'IDCLIENTE' =>$results['ID'],
		  'DIRECCIONLAT' =>$results['DIRECCIONLAT'],
		  'DIRECCIONLON' => $results['DIRECCIONLON'],
        ]);
        
        $LAST_ID = $conn->lastInsertId();
        echo "<script type='text/javascript'>

                alert('$LAST_ID');

</script>";

?>