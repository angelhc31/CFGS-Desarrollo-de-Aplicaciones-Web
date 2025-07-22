function calcularSalario() {
    let salario=Number(document.getElementById("salario").value);
    let edad= Number(document.getElementById("edad").value);
    console.log(salario);
    console.log(edad);
    if (salario<2000 && salario>=1000) {
        if (edad>45) {
            salario=salario+(salario*3/100);
        } else {
            salario=salario+(salario*10/100);
        }
    } else if (salario<1000) {
        if (edad<30) {
            salario=1100;
        } else if (edad>=30 && edad<45) {
            salario=salario+(salario*3/100);
        } else {
            salario=salario+(salario*15/100);
        }
    }

    document.getElementById("result").innerHTML=salario;

    document.getElementById("salario").value="";
    document.getElementById("nombre").value="";
    document.getElementById("edad").value="";
}