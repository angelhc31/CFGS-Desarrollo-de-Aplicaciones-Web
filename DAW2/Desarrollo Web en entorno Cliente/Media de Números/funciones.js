let cont=0;
numeros=new Array();

function añadirNum(){

    if (isNaN(document.getElementById("numero").value) == false) {
        numeros[cont]=Number(document.getElementById("numero").value);
        cont++;
    } else {
        window.alert("Eso no es un número, introduce un número por favor.");
    }

    document.getElementById("numero").value="";
}

function terminar(){  
    let media = 0;

    for (let i = 0; i < numeros.length; i++) {
        media = media + numeros[i];
    }

    media = media / numeros.length;

    document.getElementById("result").innerHTML="La media de ";
    for (let i = 0; i < numeros.length; i++) {
        document.getElementById("result").innerHTML = document.getElementById("result").innerHTML + numeros[i] + " ";
    }
    document.getElementById("result").innerHTML = document.getElementById("result").innerHTML + "es: " + media;

    document.getElementById("ocultar").style.display="none";
}