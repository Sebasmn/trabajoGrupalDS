<?php 

session_start();

if (!isset($_SESSION['user_id'])) :
    # code...
 /*ACCIONES CUANDO NO HAY SESION*/
    echo'<script type="text/javascript">
  
 
    </script>';
   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/prueba.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin="" />
    <script src="js/validarCedula.js"></script>
</head>

<body >


    
    <div class="login-wrap">
        
        <div class="login-html">
        <input id="tab-3"
        
             type="radio" name="tab"
              class="sign-in" ><label for="tab-3" class="tab" >
              <a
              href="index.php" >  
              Inicio
                    </a>
                </label>




            <input id="tab-1"
             type="radio" name="tab"
              class="sign-in" checked><label for="tab-1" class="tab">Ingresar</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab" onclick="mostrar()">Registrarse</label>
            
            <div class="login-form">
            <!-- Fromulario LOGIN -->   
            <div class="sign-in-htm">
            <form  action=login.php  id=formularioLog onsubmit= 'return validarLogin()'
             method=post >
                    <div class="group">
                        <label for="cedula" class="label">Cedula</label>
                        <input  required=true
                        name="cedula"
                        id="cedula" 
                        type="number"
                         class="input">
                    </div>
                    <div class="group">
                        <label for="claveLog" class="label">Clave de Acceso</label>
                        <input required=true
                        
                        name="claveLog" 
                        id="claveLog" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <input id="check" type="checkbox" class="check" checked>
                        <label for="check"><span class="icon"></span> Mantener sesion iniciada</label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Ingresar">
                    </div>
                    </form>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="#forgot">No recuerdas tu clave?</a>
                    </div>
            
            <!-- Fromulario LOGIN -->   


            <!-- Fromulario REGISTRO -->   
                    <form 
                    action=registro.php
                     id=formulario  
                    method="post"
                     onsubmit="return validarRegistro()">
                </div>
                <div class="sign-up-htm">
                    <div class="group">
                        <label for="nombre" class="label">Nombre</label>
                        <input
                        required="true"
                         id="nombre" type="text" class="input"
                         name="nombre">
                    </div>
                    <div id = "ub">
                        <label for="clave" class="label">SELECCIONE SU UBICACION</label>
                        </div>
                    <div class="group">
                        <label for="apellido" class="label">Apellido</label>
                        <input  name="apellido"
                        required="true"
                        id="apellido" type="text" class="input">
                    </div>
                    
                    
                    <div class="group">
                        <label for="cedulaR" 
                        class="label">Cedula</label>
                        <input  
                         name="cedulaR"
                        required="true"
                        id="cedulaR" type="number" class="input">
                    </div>
                    
                    
                    <div class="group">
                        <label for="clave" class="label">Contraseña</label>
                        <input
                         name="claveR"
                        required="true"
                        id="claveR" type="password" class="input" data-type="password">
                    </div>
                        
                    <div id="myMap" 
                    >
                    
                </div>
                <div  >
                    <img 
                    id="direccionSeleccionada"
                    src="imagenes/visto.png">
                    </div>

                    <div class="group">
                        <label for="clave2" class="label">Repita la contraseña</label>
                        <input  name="clave2"
                         required="true"
                         id="clave2" type="password" 
                         class="input" data-type="password">
                    </div>

                    

                    <div class="group">
                        <label for="email" class="label">Correo Electrónico</label>
                        <input  name="email"
                        required="true"
                         id="email" type="email" class="input"    >
                    </div>
                    <div class="group">
                        <label for="telefono" class="label">Telefono</label>
                        <input 
                        name="telefono"
                          required="true"
                        id="telefono" type="number" class="input">
                    </div>
             
                    <div class="group">
                        <input name="direccionLAT"
                          required="true"
                        id="direccionLAT" 
                        type='hidden'
                         class="input"
                         value=""
                         >
                    </div>
                    <div class="group">
                        <input name="direccionLON"
                          required="true"
                        id="direccionLON" 
                        type='hidden'
                        value=""
                         class="input">
                    </div>



                    <div class="group">
                        <input
                         type="submit" 
                         class="button" value="Registrarse">
                    </div>
                </form>

                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <label for="tab-1">Ya eres miembro?</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>



</body>



<?php else:  

//METER AQUI EL BOTON DE SALIR O ALGO MAS
header('Location: comprar.php'); 
?>


<?php endif; ?>


<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin="">
</script>
   <script src="js/map.js"></script>
</html>