
<!DOCTYPE html>
<html>
<head>
<?php 

session_start();

if (isset($_SESSION['user_id'])) {
    # code...
    
    header('Location: /index.html');
}

?>
    <meta charset="UTF-8">
    <title>Inicio Sesión</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="js/validarCedula.js"></script>
</head>
<body>
    <div class="registro">
        <h1>Registro de usuario</h1>
        <form  action=registro.php id=formulario  method="post" onsubmit="return validar()">
            <input type="text" name="nombre" placeholder="Nombre" required="required" />
            <input type="text" name="apellido" placeholder="Apellido" required="required" />
            <input type="password" name="clave" placeholder="Contraseña" required="required" />
            <input  
            type="text" name="cedula" id="cedula" placeholder="Cédula" required="required" />
            <input type="text" name="direccion" placeholder="Dirección" required="required" />
            <input type="number" name="telefono" placeholder="Teléfono" required="required" />
            <button  class="btn btn-primary btn-block btn-large"
            type = "submit"  
          >Enviar Mudo</button>
            <button
         
            class="btn btn-primary btn-block btn-large"><a href="login.html">Volver</a></button>
        </form>
    </div>
</body>

</html>