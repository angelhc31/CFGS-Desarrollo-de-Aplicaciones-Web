let num=Math.floor(Math.random()*100)+1;
let cont=0;

function esMiNum(){
    cont++;
    let numCli=Number(document.getElementById("numero").value);

    if (isNaN(numCli)==true) {
        window.alert("Eso no es un número, por favor introduce un nuevo número.");
    } else {
        if (numCli==num) {
            document.getElementById("numero").style.display="none";
            document.getElementById("boton").style.display="none";
            document.getElementById("indicador").style.display="none";
            document.getElementById("boton2").style.display="block";
            document.getElementById("boton2").style.alignContent="center";
            document.getElementById("result").innerHTML="HAS GANADO!!!"; 
            document.getElementById("intentos").innerHTML="Has necesitado "+cont+" intentos.";  
        } else {
            if (numCli<num) {
                document.getElementById("indicador").innerHTML="El número es mayor.";
            } else {
                document.getElementById("indicador").innerHTML="El número es menor.";
            }
        }
    }

    document.getElementById("numero").value="";
}

function juegoNuevo(){
    window.location.reload();
}