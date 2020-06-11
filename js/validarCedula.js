
function validar(){
   // var cedula = prompt("Ingrese su cedula");
    var cedula = document.getElementById("cedula").value;
    //alert("Validando");
    //document.getElementById("cedula").innerText="Cedula: "+ cedula;
    var cadena= cedula.split("");
    var provincia =  cedula[0].toString() +  cedula[1].toString();
    var n = parseInt(provincia);
    var total=0;
    //PRONVICA 
    if  (   n>=1 && n<=24    ){
        //VALIDO
        for(var i=0;i<=8;i++){
            var aux=0;
            if((i+1)%2==0){
               aux= cadena[i]*1;
            }else{
                aux=cadena[i]*2;
                if(aux>=10){
                    aux=aux-9;
                }
            }
            total=total+aux;
            }
            var final = (total.toString()).split("");
           var digito= final[final.length-1];
          var  sumador = 10-(parseInt(digito));
           var decimalSiguiente=sumador+total;
           if(sumador==10){
            decimalSiguiente=total;
            }
           var resultado = decimalSiguiente - total;
           if(resultado == cadena[cadena.length-1]     ){
    
          //  document.getElementById("validez").innerText= "Validado: "+
            //resultado + " = "+cadena[cadena.length-1] ;
           // alert("CORRECTO");
            document.getElementById("formulario").submit();
          
            return true;
           }
    }else{
    
        //document.getElementById("validez").innerText="No valido";
        alert("Digite una cédula correcta.");
        document.getElementById("cedula").value="";
        document.getElementById("cedula").focus();
        return false;
    }
    
    }

    //MOSTRAR MAPA
 function mostrarMapa(){

        
let myMap = L.map('myMap').setView([51.505, -0.09], 13)

L.tileLayer(`https://maps.wikimedia.org/osm-intl/{z}/{x}/{y}.png`, {
	maxZoom: 18,
}).addTo(myMap);

let marker = L.marker([51.5, -0.09]).addTo(myMap)

let iconMarker = L.icon({
    iconUrl: 'marker.png',
    iconSize: [60, 60],
    iconAnchor: [30, 60]
})

let marker2 = L.marker([51.51, -0.09], { icon: iconMarker }).addTo(myMap)

myMap.doubleClickZoom.disable()
myMap.on('dblclick', e => {
  let latLng = myMap.mouseEventToLatLng(e.originalEvent);

  L.marker([latLng.lat, latLng.lng], { icon: iconMarker }).addTo(myMap)
})

navigator.geolocation.getCurrentPosition(
  (pos) => {
    const { coords } = pos
    const { latitude, longitude } = coords
    L.marker([latitude, longitude], { icon: iconMarker }).addTo(myMap)

    setTimeout(() => {
      myMap.panTo(new L.LatLng(latitude, longitude))
    }, 5000)
  },
  (error) => {
    console.log(error)
  },
  {
    enableHighAccuracy: true,
    timeout: 5000,
    maximumAge: 0
  })

   
}
    
    