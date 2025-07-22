function mostrarContraseña() {
    if ( document.getElementById("boton").innerHTML == "Mostrar contraseña") {
        document.getElementById("paswd").type = "text";
        document.getElementById("boton").innerHTML = "Ocultar contraseña";
    } else {
        document.getElementById("paswd").type = "password";
        document.getElementById("boton").innerHTML = "Mostrar contraseña";
    }
}

function comprobar() {
    let nombre = document.getElementById("name").value;
    let paswd = document.getElementById("paswd").value;
    let correcto = true;
    for (let i = 0; i < nombre.length; i++) {
        if (nombre.charCodeAt(i)>122 || nombre.charCodeAt(i)<97 && nombre.charCodeAt(i)>57 || nombre.charCodeAt(i)<48) 
            correcto = false;
    }
    if (correcto == false){
        window.alert("El nombre de usuario solo puede tener minúsculas y números.");
    } else {
        if (comprobarPaswd()) {
            window.alert("La información se ha almacenado correctamente.");
        } else {
            window.alert("La contraseña debe tener: una mayúscula, una minúscula, un número y un carácter especial.");
        }
    }
    
    function comprobarPaswd() {
        let tieneMaysc = false;
        let tieneMinsc = false;
        let tieneNum = false;
        let tieneCarEsp = false;

        for (let i = 0; i < paswd.length; i++) {
            if (paswd.charCodeAt(i)<=90 && paswd.charCodeAt(i)>=65) {
                tieneMaysc = true;
            }
            if (paswd.charCodeAt(i)<=122 && paswd.charCodeAt(i)>=97) {
                tieneMinsc = true;
            }
            if (paswd.charCodeAt(i)<=57 && paswd.charCodeAt(i)>=48) {
                tieneNum = true;
            }
            if (paswd.charCodeAt(i)<=47 && paswd.charCodeAt(i)>=32 || paswd.charCodeAt(i)<=64 && paswd.charCodeAt(i)>=58 || paswd.charCodeAt(i)<=96 && paswd.charCodeAt(i)>=91 || paswd.charCodeAt(i)>=123) {
                tieneCarEsp = true;
            }
        }
        
        if (tieneMaysc && tieneMinsc && tieneNum && tieneCarEsp) {
            return true;
        } else {
            return false;
        }
    }

    document.getElementById("name").value = "";
    document.getElementById("paswd").value = "";
}