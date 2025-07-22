let tablero = [];
let coord1 = 0;
let coord2 = 0;

let terminado = false;
let sitioEncontrado = false;
let sitioLibre = false;

let derLibre = false;
let izqLibre = false;
let arrLibre = false;
let abjLibre = false;

let cont = 0;
let dondeIra = 0;

for (let i = 0; i < 10; i++) {
    tablero[i] = new Array(10);
}

for (let i = 0; i < 10; i++) {
    for (let j = 0; j < 10; j++) {
        tablero[i][j] = 0;
    }
}


//hacer barcos

//barcos de 1
while (cont <2) {
    terminado = false;
    while (terminado == false) {
        coord1 = Math.floor(Math.random() * 10);
        coord2 = Math.floor(Math.random() * 10);

        if (tablero[coord1][coord2] == 0) {
            tablero[coord1][coord2] = 1;
            terminado = true;
            cont++;
        }
    }
}

//barcos de 2
cont = 0;
while (cont <3) {
    derLibre = false;
    izqLibre = false;
    arrLibre = false;
    abjLibre = false;
    sitioEncontrado = false;
    terminado = false;

    while (terminado == false) {
        sitioLibre = false;
        sitioEncontrado = false;
        coord1 = Math.floor(Math.random() * 10);
        coord2 = Math.floor(Math.random() * 10);

        if (tablero[coord1][coord2] == 0) {
            if (coord1-1 >= 0) {
                if (tablero[coord1-1][coord2] == 0) {
                    arrLibre = true;
                    sitioLibre = true;
                }
            }
            if (coord1+1 < 10) {
                if (tablero[coord1+1][coord2] == 0) {
                    abjLibre = true;
                    sitioLibre = true;
                }
            }
            if (coord2-1 >= 0){
                if (tablero[coord1][coord2-1] == 0) {
                    izqLibre = true;
                    sitioLibre = true;
                }
            }
            if (coord2+1 < 10){
                if (tablero[coord1][coord2+1] == 0) {
                    derLibre = true;
                    sitioLibre = true;
                }
            }

            if (sitioLibre == true) {
                tablero[coord1][coord2] = 1;
                terminado = true;
                cont++;   
                while (sitioEncontrado == false) {
                    //1 izq
                    //2 der
                    //3 arr
                    //4 abj
                    dondeIra = Math.floor(Math.random() * (5)+1);
                    switch (dondeIra) {
                        case 1:
                            if (izqLibre == true) {
                                sitioEncontrado = true;
                            }
                            break;
                        case 2:
                            if (derLibre == true) {
                                sitioEncontrado = true;
                            }
                            break;
                        case 3:
                            if (arrLibre == true) {
                                sitioEncontrado = true;
                            }
                            break;
                        case 4:
                            if (abjLibre == true) {
                                sitioEncontrado = true;
                            }
                            break;
                    }
                }

                switch (dondeIra) {
                    case 1:
                        tablero[coord1][coord2-1] = 1;
                        break;
                    case 2:
                        tablero[coord1][coord2+1] = 1;
                        break;
                    case 3:
                        tablero[coord1-1][coord2] = 1;
                        break;
                    case 4:
                        tablero[coord1+1][coord2] = 1;
                        break;
                }
            }
        }
    }
}


//mostrar el mapa

for (let i = 0; i < 10; i++) {
    for (let j = 0; j < 10; j++) {
        if (tablero[i][j] == 1) {
                document.getElementById(i+"-"+j).style.backgroundColor = "black";
        }
        if (tablero[i][j] == 2) {
            document.getElementById(i+"-"+j).style.backgroundColor = "red";
    }
    }
}

function menu() {
    let opcion = Number(document.getElementById("opcion").value);

    switch (opcion) {
        case 1:
            window.alert("Generar tablero");
            break;
        case 2:
            window.alert("Mostrar tablero");
            break;
        case 3:
            window.alert("Disparar");
            break;
        case 4:
            window.alert("Salir");
            break;
    }
    document.getElementById("opcion").value = "";
}

function disparar() {
    let coordX = document.getElementById("coordX").value;
    let coordY = document.getElementById("coordY").value;

    if (tablero[coordY][coordX] == 1) {
        tablero[coordY][coordX] = 2;
    }


    coordX = document.getElementById("coordX").value = "";
    coordY = document.getElementById("coordY").value = "";

    for (let i = 0; i < 10; i++) {
        for (let j = 0; j < 10; j++) {
            if (tablero[i][j] == 1) {
                    document.getElementById(i+"-"+j).style.backgroundColor = "black";
            }
            if (tablero[i][j] == 2) {
                document.getElementById(i+"-"+j).style.backgroundColor = "red";
        }
        }
    }
}