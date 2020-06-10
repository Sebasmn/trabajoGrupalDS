
function validar(){
    var cedula = prompt("Ingrese su cedula");
   // var cedula = document.getElementById("cedula").value;
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
            alert("CORRECTO");
           // document.getElementById("formulario").submit();
          
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
    
    
    