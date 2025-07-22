function fondoAleatorio() {
    let colorAleatorio="#";
    var num;
    digitosHexa = new Array("0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F");

    for (i=0;i<6;i++) {
        num = Math.random() * 16;
        num = Math.floor(num);
        colorAleatorio = colorAleatorio + digitosHexa[num];
    }
    document.getElementById("cuerpo").style.backgroundColor = colorAleatorio;

    return colorAleatorio;
}

window.onload = fondoAleatorio();