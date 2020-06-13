//
function validarRegistro(){
  var cedula = document.getElementById("cedulaR").value;
  var cadena= cedula.split("");
  if(   cadena.length==10){ 
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
             //CEDULA CORRECTA
             var clave2 = document.getElementById("clave2").value;
             var claveR = document.getElementById("claveR").value;
            //CLAVES COINCIDAN
            if ( clave2== claveR){
              var direccionLAT = document.getElementById("direccionLAT").value;
              var direccionLON = document.getElementById("direccionLON").value;
              if(
                direccionLAT!=null && direccionLON != null
              ){
                document.getElementById("formulario").submit();
                return true;

              }else{
                alert('Selecciona una ubicacion en el mapa..');
                 document.getElementById("myMap").focus();
                 return false;
              }
      
            }else{
              alert('Contraseñas no coinciden ');
              document.getElementById("clave2").value="";
              document.getElementById("claveR").value="";
              document.getElementById("claveR").focus();
              return false;
            }
            
           }
    }else{
    
        //document.getElementById("validez").innerText="No valido";
        alert("Digite una cédula correcta.");
        document.getElementById("cedulaR").value="";
        document.getElementById("cedulaR").focus();
        return false;
    }
    
    }else{
      //CONTIENE LETRAS O DIGITOS
      alert("Revise formato cedula !");
      document.getElementById("cedulaR").value="";
        document.getElementById("cedulaR").focus();
        return false;
    }
  }
document.getElementById("myMap").style.display = "none";
function mostrar(){
  
  document.getElementById("myMap").style.visibility = "visible";
}