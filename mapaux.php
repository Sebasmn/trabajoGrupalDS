
<!DOCTYPE html>
<html>
<head>
    
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/mapa2.css">
  
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin="" />
</head>
<body>
<div  >
                    <img 
                    id="direccionSeleccionada"
                    src="imagenes/visto.png">
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
    <div id="myMap">


</div>
</body>
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin="">
</script>
   <script src="js/map.js"></script>
</html> 