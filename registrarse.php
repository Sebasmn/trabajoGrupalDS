
<!DOCTYPE html>
<html>
<head>
    
    <meta charset="UTF-8">
    <title>Inicio Sesión</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="js/validarCedula.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin="" />
</head>
<body>
    <br>
    
        <h1 style="text-align: center; color: whitesmoke;">Registro de usuario</h1>
    <br>    
    <section class="registro">
        <div class="inicio1"></div>
        <div class="izquierda">
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
        <div class="centro1">

        </div>
        <div class="derecha">
            <div id="myMap" style="height: 300px; width: 100%;" ></div>

  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>
  <script src="map.js"></script>
        </div>
        <div class="final1"></div>
    </section>
</body>

</html>