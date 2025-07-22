function conseguirPuntuación(){
    let punt=document.getElementById("nota").value;
    let nota;
    if (punt<5) {
        nota="Insuficiente";
    } else {
        if (punt<6) {
            nota="Suficiente";
        } else {
            if (punt<7) {
                nota="Bien";
            } else {
                if (punt<9) {
                    nota="Notable";
                } else {
                    if (punt<10) {
                        nota="Excelente";
                    } else {
                        nota="Sobresaliente";
                    }
                }
            }   
        }
    }
    document.getElementById("result").innerHTML="Tienes un: " + nota;
    document.getElementById("nota").value="";
}