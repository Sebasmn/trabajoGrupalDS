<?php 

session_start();


if (isset($_SESSION['user_id'])) :
    # code...
 /*mOSTRAR BOTON DE  SALIDA AL COSTADO*/    
 
    echo'<script type="text/javascript">
   
    
 
    </script>';

    //carrito
    
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

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pedidos Medicamentos</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="style.css" type="text/css" rel="stylesheet" />
    </head>
    <body id="page-top" style="background-color:black">
        
        <header class="masthead">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a 
                id="status"
                class="navbar-brand js-scroll-trigger" 
                href="#page-top">
            
            
            </a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">Inicio</a></li>                   
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="comprar.php">Comprar</a></li>
						<li><a 
                        id="botonAdmin"
                        style = "visibility:    hidden"
                        class="btn btn-primary js-scroll-trigger"
                         style="margin:15px" href="admin.php">
						 Administrador
						 </a></li>
						<li><a 
                        id="botonCerrarSesion"
                        style = "visibility:    hidden"
                        class="btn btn-primary js-scroll-trigger"
                         style="margin:15px" href="salir.php">
						 Cerrar sesión
						 </a></li>
						 
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <br><br><br>
        <!-- About-->
            
                        
<div id="shopping-cart"> 
<div class="txt-heading" style="color:white">Carrito de compras</div>
<br><br>
<a id="btnEmpty" href="comprar.php?action=empty">Vaciar carrito</a>
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
<th style="text-align:right;" width="10%">Subtotal</th>
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
				<td style="text-align:center;"><a href="comprar.php?action=remove&code=<?php echo $item["CODIGO"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
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
<div class="no-records" style="color:white">Tu carrito esta vacio</div>
<?php 
}

?>
<a id="btnEmpty" href="#">Comprar</a>
</div>
<br>
<div id="product-grid">
	<div class="txt-heading" style="color:white">Medicamentos</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM productos ORDER BY ID ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="comprar.php?action=add&code=<?php echo $product_array[$key]["CODIGO"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["IMAGEN"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["NOMBRE"]; ?></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["PRECIO"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Agregar" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
    <?php else:  


echo'<script type="text/javascript">

    </script>';
     /*NO MOSTRAR BOTON DE  SALIDA AL COSTADO*/ 
     header('Location:  loginFinal.php');
?>


<?php endif; ?>

<?php 


if (isset($_SESSION['user_id'])) :
    # code...
 /*mOSTRAR BOTON DE  SALIDA AL COSTADO*/ 
 $usuario = $_SESSION['user_id'] ;
    echo'<script type="text/javascript">
    document.getElementById("status").innerHTML=
    "Sesion Abierta! ";
    document.getElementById("botonCerrarSesion").style.visibility = "visible";
    </script>';
   

	if(isset($_SESSION['rol'])	&&	$_SESSION['rol']==1){
		echo'<script type="text/javascript">
		document.getElementById("botonAdmin").style.visibility = "visible";
		</script>';
	}




?>
<?php endif; ?>

</html>
