let cont = 0;
let palabras = [];
function anadirPalabras() {
    palabras [cont]= document.getElementById("palabra").value;
    document.getElementById("palabra").value = "";
    cont++;
}

function invertirPalabras() {
    for (let i = palabras.length-1; i >= 0; i--) {
        document.getElementById("result").innerHTML = document.getElementById("result").innerHTML + " " + palabras[i];
    } 

    document.getElementById("ocult").style.display = "none";
}