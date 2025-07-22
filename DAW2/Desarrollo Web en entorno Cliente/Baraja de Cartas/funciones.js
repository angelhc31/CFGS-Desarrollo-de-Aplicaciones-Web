class Carta {
    palo = "";
    numero = 1;

    constructor(palo, numero){
        this.palo   = palo;
        this.numero = numero;
    }
}

let barajaCarta = [];
let carta;

function crearBaraja() {

    const tipos = ["Picas", "Trévoles","Corazones","Rombos"];
    const numeros = ['1','2','3','4','5','6','7','8','9','10','J','Q','K'];

    let cont = 0;
    for (let j = 0; j < tipos.length; j++){
        for(let k = 0; k < numeros.length; k++){
            barajaCarta[cont] = new Carta(tipos[j], numeros[k]);
            cont++;
        }   
    }
    mostrarBaraja();
    document.getElementById("init").style.display = "none";
}

function barajar (){
    for (let i = barajaCarta.length - 1; i > 0; i--) {
        let j = Math.floor(Math.random() * (i + 1));
        let temp = barajaCarta[i];
        barajaCarta[i] = barajaCarta[j];
        barajaCarta[j] = temp;
    }
    mostrarBaraja();
}
function sacarCarta () {
    if (document.getElementById("sCard").innerHTML == "Sacar carta") {
        carta = barajaCarta.pop();
        document.getElementById("card").innerHTML = carta.numero + carta.palo + carta.numero;
        document.getElementById("sCard").innerHTML = "Devolver carta";
    } else {
        barajaCarta[barajaCarta.length] = carta;
        document.getElementById("card").innerHTML = "";
        document.getElementById("sCard").innerHTML = "Sacar carta";
    }
    mostrarBaraja();
}

function mostrarBaraja () {
    let cont = 0;
    let i = 0;
    let j = 0;
    while (cont < barajaCarta.length) {
        if (j == 10) {
            j = 0;
            i++;
        }
        console.log(cont);
        document.getElementById(i+"-"+j).innerHTML = barajaCarta[cont].numero + barajaCarta[cont].palo + barajaCarta[cont].numero;
        cont++;
        j++;
    }
    if (barajaCarta.length == 51) {
        document.getElementById("5-1").innerHTML = "";
    }
}
