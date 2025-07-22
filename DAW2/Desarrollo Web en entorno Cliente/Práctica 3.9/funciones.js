function calcularFactorial(){
    let result=1;
    for (let i = 2; i <= document.getElementById("numero").value; i++) {
        
        result=result*i;
    }

    document.getElementById("result").innerHTML="El facotrial de "+ document.getElementById("numero").value + " es " + result;
}