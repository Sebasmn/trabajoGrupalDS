var cedula = document.getElementById("cedula").value;
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
    continue;
} else {
    alert("Digite una cédula correcta...");
}
document.write(valaprox);
function redondear(numero){
    if(numero%10 == 0){
        return numero;
    }else {
        return (parseInt(numero/10) * 10) + 10;
    }
}