function generarPaswd() {
    hayMaysc = false;
    hayMinsc = false;
    hayCarEsp = false;
    hayNum = false;

    paswd = [];
    paswdFinal = "";
    carsPaswd = Number(document.getElementById("numCars").value);
    cars = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","0","1","2","3","4","5","6","7","8","9",".","-","_","$","&","#","@"];
    document.getElementById("numCars").value = "";

    if (carsPaswd < 4) {
        alert("La contraseña debe tener como mínimo 4 caracteres");
    } else {
        for (let i = 0; i < carsPaswd; i++) {
            paswd[i] = cars[Math.floor(Math.random() * cars.length)];
        }
            
        while (hayMaysc == false || hayMinsc == false || hayNum == false || hayCarEsp == false) {
            hayMaysc = false;
            hayMinsc = false;
            hayCarEsp = false;
            hayNum = false;
            
            for (let i = 0; i < paswd.length; i++) {
                if (hayMaysc == false && paswd[i].charCodeAt(0)<=90 && paswd[i].charCodeAt(0)>=65) {
                    hayMaysc = true;
                }

                if (hayMinsc == false && paswd[i].charCodeAt(0)<=122 && paswd[i].charCodeAt(0)>=97) {
                    hayMinsc = true;
                }

                if (hayNum == false && paswd[i].charCodeAt(0)<=57 && paswd[i].charCodeAt(0)>=48) {
                    hayNum = true;
                }

                if (hayCarEsp == false && paswd[i].charCodeAt(0)<=47 && paswd[i].charCodeAt(0)>=32 || paswd[i].charCodeAt(0)<=64 && paswd[i].charCodeAt(0)>=58 || paswd[i].charCodeAt(0)<=96 && paswd[i].charCodeAt(0)>=91 || paswd[i].charCodeAt(0)>=123) {
                    hayCarEsp = true;
                }
            }

            if (hayMaysc == false) {
                paswd[Math.floor(Math.random() * paswd.length)] = cars[Math.floor(Math.random() * 26)];
            }

            if (hayMinsc == false) {
                paswd[Math.floor(Math.random() * paswd.length)] = cars[Math.floor(Math.random() * (52-26)+26)];
            }

            if (hayNum == false) {
                paswd[Math.floor(Math.random() * paswd.length)] = cars[Math.floor(Math.random() * (62-52)+52)];            
            }

            if (hayCarEsp == false) {
                paswd[Math.floor(Math.random() * paswd.length)] = cars[Math.floor(Math.random() * (69-62)+62)];

            }
        }

        for (let i = 0; i < paswd.length; i++) {
            paswdFinal = paswdFinal + paswd[i];
        }

        document.getElementById("result").innerHTML = paswdFinal;
    }
}