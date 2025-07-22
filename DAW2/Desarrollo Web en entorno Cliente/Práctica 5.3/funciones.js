function esPrimo()  {

    let num = Number(document.getElementById("num").value);
    let es = true;

    for (let i = 2; i < num; i++) {
        if (num % i==0){
            es = false;
        }
    }

    if (es == false) {
        document.getElementById("result").innerHTML = "No es primo";
    } else {
        document.getElementById("result").innerHTML = "Es primo";
    }

    document.getElementById("num").value = "";
}