function myFunction1(){
    if (document.getElementById("numero").value!="") {
        if (!isNaN(document.getElementById("numero").value)) {
            document.getElementById("result").style.color = "green";
            document.getElementById("result").innerHTML = "Es un número!!!";
        } else { 
            document.getElementById("result").style.color = "red";
            document.getElementById("result").innerHTML = "No es un número";       
        }
    } else {
        document.getElementById("result").innerHTML = ""; 
    }
}