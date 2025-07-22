let cont = 0;
let notas = [];

function anadirNota() {
    notas[cont] = document.getElementById("nota").value;

    cont++;

    document.getElementById("nota").value = "";
}

function calcularMedia() {
    let result = 0;
    for (let i = 0; i < notas.length; i++) {
        result = result + Number(notas [i]);
    }
    result = result/cont;

    document.getElementById("nota").value = "";
    document.getElementById("result").innerHTML = "La media es: " + result;
}