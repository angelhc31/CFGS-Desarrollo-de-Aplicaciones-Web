window.onload = numsLoteria();

function numsLoteria(){
    numeros=new Array();
    let boleto="";
    let cont=0;
    let valido=true;

    while (cont<50) {
        boleto="";
        valido=true;

        //Generar boleto
        for (let i = 0; i < 6; i++) {
            boleto=boleto + " " + Math.floor((Math.random() *49)+ 1);
        }

        //Saber si está repetido
        for (let i = 0; i < numeros.length && valido==true; i++) {
            if (boleto==numeros[i]){
                valido=false;
            }
        }

        //Introducir nuestro boleto en el bombo y ++ el contador
        if (valido==true) {
            numeros[cont]=boleto;
            cont++;
        }
    }
}

function mostrarNums(){

    
    for (let i = 0; i < numeros.length; i++) {
        document.getElementById("result").innerHTML = document.getElementById("result").innerHTML + "<br><br>" + (i+1) + "." + numeros[i];
    }

    document.getElementById("boton").style.display="none";
}