<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM productos WHERE CODIGO='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["CODIGO"]=>array('NOMBRE'=>$productByCode[0]["NOMBRE"], 'CODIGO'=>$productByCode[0]["CODIGO"], 'quantity'=>$_POST["quantity"], 'PRECIO'=>$productByCode[0]["PRECIO"], 'IMAGEN'=>$productByCode[0]["IMAGEN"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["CODIGO"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["CODIGO"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<HEAD>
<TITLE>Carrito de compras</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div id="shopping-cart">
<div class="txt-heading">Carrito de compras</div>

<a id="btnEmpty" href="carrito.php?action=empty">Vaciar carrito</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Nombre</th>
<th style="text-align:left;">Códigos</th>
<th style="text-align:right;" width="5%">Cantidad</th>
<th style="text-align:right;" width="10%">Precio Unitario</th>
<th style="text-align:right;" width="10%">Precio</th>
<th style="text-align:center;" width="5%">Eliminar</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["PRECIO"];
		?>
				<tr>
				<td><img src="<?php echo $item["IMAGEN"]; ?>" class="cart-item-image" /><?php echo $item["NOMBRE"]; ?></td>
				<td><?php echo $item["CODIGO"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["PRECIO"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="carrito.php?action=remove&code=<?php echo $item["CODIGO"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["PRECIO"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Tu carrito esta vacio</div>
<?php 
}
?>
</div>

<div id="product-grid">
	<div class="txt-heading">Medicamentos</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM productos ORDER BY ID ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="carrito.php?action=add&code=<?php echo $product_array[$key]["CODIGO"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["IMAGEN"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["NOMBRE"]; ?></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["PRECIO"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
</BODY>
</HTML>