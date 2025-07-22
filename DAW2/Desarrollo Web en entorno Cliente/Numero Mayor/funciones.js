let num1;
let num2;
let num3;

function cargarNumeros(){
    if (num1==undefined) {
        num1=document.getElementById("numero").value;
    } else {
        if (num2==undefined) {
            num2=document.getElementById("numero").value;
        } else {
            if (num3==undefined) {
                num3=document.getElementById("numero").value;
                averiguarMayor();
                document.getElementById("numero").style.display="none";
                document.getElementById("boton").style.display="none";
            } 
        }
    }
    document.getElementById("numero").value="";
}

function averiguarMayor() {
    let mayor=0;
    
    if (num1>mayor) {
        mayor=num1;
    }
    if (num2>mayor) {
        mayor=num2;
    }
    if (num3>mayor) {
        mayor=num3;
    }
    document.getElementById("result").innerHTML="El numero mayor es:  " + mayor;
}