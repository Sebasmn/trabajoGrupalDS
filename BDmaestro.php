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
            $fecha = date('Y/m/d');
        
		$sql->execute([
		  'FECHA' => $fecha,
		  'IDCLIENTE' =>$results['ID'],
		  'DIRECCIONLAT' =>$results['DIRECCIONLAT'],
		  'DIRECCIONLON' => $results['DIRECCIONLON'],
        ]);
        
        $LAST_ID = $conn->lastInsertId();
        $_SESSION['ULTIMO_MAESTRO']=$LAST_ID;
        

       /* echo "<script type='text/javascript'>

                alert('$LAST_ID');

</script>";*/




foreach($_SESSION["cart_item"] as $item):		
	$item_price=$item["CODIGO"];
	$C = $item["quantity"];
	$P= $item["PRECIO"];
	$N= $item["NOMBRE"];
	/*echo "<script type='text/javascript'>
                alert('$item_price');
			</script>";*/
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare("  INSERT INTO detallefactura 
    (IDMAESTROFAC,IDPRODUCTO,CANTIDAD,PRECIO,
    SUBTOTAL) 
     VALUES(:IDMAESTROFAC,
    :IDPRODUCTO,
    :CANTIDAD,
    :PRECIO,
    :SUBTOTAL);"); 

$sql->execute([
  'IDMAESTROFAC' => $LAST_ID,
  'IDPRODUCTO' =>2,
  'CANTIDAD' => $C,
  'PRECIO' =>$P,
  'SUBTOTAL' => $C*$P,	
]);
			
endforeach;

?>