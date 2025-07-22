window.onload = generarNums();

function generarNums(){
    numeros=new Array();
    numVeces=new Array();
    let cont;

    for (let i = 0; i < 10000; i++) {
        numeros[i]=Math.floor((Math.random() *10)+ 1);
    }

    for (let i = 1; i <= 10; i++) {
        cont=0;
        for (let j = 0; j < numeros.length; j++) {
            if (numeros[j]==i) {
                cont++;
            }
        }
        numVeces[i]=cont;
    }
}

function mostrarNums(){

    
    for (let i = 1; i < numVeces.length; i++) {
        document.getElementById("result").innerHTML = document.getElementById("result").innerHTML + "<br><br>" + "El número " + i + " se repite " + numVeces[i] + "veces";
    }

    document.getElementById("boton").style.display="none";
}