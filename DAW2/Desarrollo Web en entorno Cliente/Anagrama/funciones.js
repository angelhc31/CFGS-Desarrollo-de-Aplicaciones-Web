let frase1 = "";
let frase2 = "";

function esAnagrama() {
    if (frase1.length == 0) {
        frase1 = document.getElementById("frases").value.toLowerCase().split("").sort().join("");
        document.getElementById("frases").placeholder = "Introduce otra frase...";
        document.getElementById("boton").innerHTML = "Comprobar si es un anagrama";
    } else {
        if (frase2.length == 0) {
            frase2 = document.getElementById("frases").value.toLowerCase().split("").sort().join("");
            document.getElementById("frases").style.display = "none";
            document.getElementById("boton").style.display = "none";

            if (frase1 === frase2) {
                document.getElementById("result").style.color = "green";
                document.getElementById("result").innerHTML = "Es un anagrama";
            } else {
                document.getElementById("result").style.color = "red";
                document.getElementById("result").innerHTML = "No es un anagrama";
            }
        }
    }

    document.getElementById("frases").value = "";
}