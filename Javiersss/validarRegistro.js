function validarRegistro(){
    alert('validando');
    var cedula = document.getElementById("cedulaR").value;
    var cadena= cedula.split("");
    if(   
     cadena.length==10
    ){ 
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
              document.getElementById("formulario").submit();
              return true;
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
        //document.getElementById("mensajeCedula").style.visibility="visible";
      }
    }