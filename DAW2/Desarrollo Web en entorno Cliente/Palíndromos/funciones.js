function palindromo(){
    let frase=document.getElementById("inp").value.replace(/[\W_]/g, "").toLowerCase();
    let fraseRevers=frase.split("").reverse().join("");
    console.log(frase);
    console.log(fraseRevers);
    
    if (frase==fraseRevers) {
        document.getElementById("result").style.color = "green";
        document.getElementById("result").innerHTML = "Si que es palíndromo.";
    }
    else {
        document.getElementById("result").style.color = "red";
        document.getElementById("result").innerHTML = "No es palíndromo.";
    }

    document.getElementById("inp").value = "";
}