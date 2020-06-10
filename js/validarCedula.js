
function validar(){
    var cedula = document.getElementById("cedula").value;
    alert(cedula);
    var arraycedula = cedula.split("");
    var ndigitos = arraycedula.slice(0,9);
    var digitos = [2,1,2,1,2,1,2,1,2];
    var aux = [];
    var num = 0; var total = 0; var valaprox = 0; var numcom = 0;
    for (i= 0; i < ndigitos.length; i++) {
        num = ndigitos[i] * digitos[i];
        if(num >= 10) {
            num = num - 9;
            aux.push(num);
            total += aux[i];
            continue;
        }
        aux.push(num);
        total += aux[i];
    }
    valaprox = redondear(total);
    numcom = valaprox - total;
    if(numcom == arraycedula[9]) {
       // document.getElementById("formulario").submit();
       alert("Correctaa...");
       return true;

    } else {
        alert("Digite una cédula correcta...");
        return false;
    }
    document.write(valaprox);
}

function redondear(numero){
    if(numero%10 == 0){
        return numero;
    }else {
        return (parseInt(numero/10) * 10) + 10;
    }
}

//NO BORRAR CON ESTO SE ENVIA EL FORMULARIO PONLE DENTRO DEL IF

//DENTRO DEL ELSE LE PONES UN ALERT O SOMETHING