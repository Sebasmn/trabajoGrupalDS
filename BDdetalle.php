<?php

echo "<script type='text/javascript'>

alert('SIIII');

</script>";
 require 'conexion.php'; 
 session_start();
$records2 = $conn->prepare("SELECT MAX(IDFACTURA) AS NOMBRE FROM maestrofactura "   );
$records2->execute();
$results2 = $records2->fetch(PDO::FETCH_ASSOC);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$idMayor=$results2['NOMBRE'] ;

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
  'IDMAESTROFAC' => $idMayor,
  'IDPRODUCTO' =>2,
  'CANTIDAD' => $C,
  'PRECIO' =>$P,
  'SUBTOTAL' => $C*$P,	
]);
			
endforeach;
?>
