var script = document.createElement('script');
script.src = '../js/jquery-3.6.0.min.js';
document.getElementsByTagName('head')[0].appendChild(script);

var card= document.getElementById("update-card");

(function () {

    /**
     * Main stopscrollwheelzoom constructor
     */
    let SSWZ = function () {

        /**
         * Handler for scroll- control must be pressed.
         * @param e
         */
        this.keyScrollHandler = function (e) {
            if (e.ctrlKey) {
                e.preventDefault();
                return false;
            }
        }
    };

    if (window === top) {
        let sswz = new SSWZ();
        window.addEventListener('wheel', sswz.keyScrollHandler, { passive: false });
    }

})();

window.addEventListener('click', function(e) {
    if (document.getElementById("divEditFoto") == null) {
        if (!card.contains(e.target) && card.style.display == "block") {
            ocultarCard(true);
        }
    } else {
        if (document.getElementById("divEditFoto").style.display == "block") {
            if (document.getElementById("falseButton").contains(e.target)) {
                setTimeout(function(){
                    document.getElementById("divEditFoto").style.display = "none";
                }, 01);
            }
            if (!document.getElementById("contenidoEditFoto").contains(e.target)) {
                document.getElementById("divEditFoto").style.display = "none";
            }
        } else {
            if (!card.contains(e.target) && card.style.display == "block") {
                ocultarCard(true);
            }
        }
    }
})

function busqueda(queBusco) {
    buscar = document.getElementById('cuadroTexto').value;

    var parametros = 
    {
        "miBusqueda" : buscar,
        "queBusco" : queBusco
    };

    $.ajax({
        data: parametros,
        url: 'busqueda.php',
        type: 'POST',
        

        success: function(mensaje)
        {
        $('#content').html(mensaje);
        }
    });
}

function reordenar(queReordeno, id) {
    ordenarPor = document.getElementById('orderBy'+id).value;

    var parametros = 
    {
        "queReordeno" : queReordeno,
        "ordenarPor" : ordenarPor,
        "id" : id
    };

    $.ajax({
        data: parametros,
        url: '../util/ordenarPor.php',
        type: 'POST',
        

        success: function(mensaje)
        {
        $('#modify-table'+id).html(mensaje);
        }
    });
}



function mostrarCard(content, idEdit, nombreEdit, extraDataEdit, extraDataEdit2, extraDataEdit3, extraDataEdit4) {
    if (document.getElementById("edit-card-content") != null) {
        document.getElementById("edit-card-content").style.display = "none";
    }
    if (document.getElementById("add-card-content") != null) {
        document.getElementById("add-card-content").style.display = "none";
    }
    switch (content) {
        case "add":
            document.getElementById("add-card-content").style.display = "block";
        break;
    
        case "editZona":
            document.getElementById("edit-card-content").style.display = "block";
            document.getElementById("tituloZona").innerHTML = "Editar " + nombreEdit;
            document.getElementById("nameZona").value = nombreEdit;
            document.getElementById("areaZona").value = extraDataEdit;
            document.getElementById("nombreActual").value = nombreEdit;
            document.getElementById("areaActual").value = extraDataEdit;
            document.getElementById("idZona").value = idEdit;
        break;

        case "editPerro":
            document.getElementById("edit-card-content").style.display = "block";

            document.getElementById("tituloPerro").innerHTML = "Editar " + nombreEdit;
            document.getElementById("namePerro").value = nombreEdit;
            document.getElementById("nombreActual").value = nombreEdit;
            document.getElementById("fech_nacimientoEdit").value = extraDataEdit;

            if (extraDataEdit2 == '') {
                document.getElementById("avatarPerroEdit").src = "../imgs/perros/no-dog-img.jpg";
            } else {
                document.getElementById("avatarPerroEdit").src = "../imgs/perros/" + extraDataEdit2;
            }

            document.getElementById("idPerro").value = idEdit;
            document.getElementById("nacimiento_actual").value = extraDataEdit;
        break;

        case "editRecolecta":
            document.getElementById("idRecolecta").value = idEdit;
            document.getElementById("fechaEdit").value = extraDataEdit;
            document.getElementById("pesoActual").value = extraDataEdit2;
            document.getElementById("pesoEdit").value = extraDataEdit2;
            perros = document.getElementsByClassName("opcionPerro");
            zonas = document.getElementsByClassName("opcionZona");
            noPerro = true;
            noZona = true;
            for (const i in perros) {
                if (Object.hasOwnProperty.call(perros, i)) {
                    const perro = perros[i];
                    if (perro.value == extraDataEdit3) {
                        perro.selected = true;
                        noPerro = false;
                    }
                }
            }
            if (noPerro) {
                document.getElementById("perroPlaceholder").selected = true;
            }
            for (const i in zonas) {
                if (Object.hasOwnProperty.call(zonas, i)) {
                    const zona = zonas[i];
                    if (zona.value == extraDataEdit4) {
                        zona.selected = true;
                        noZona = false;
                    }
                }
            }
            if (noZona) {
                document.getElementById("zonaPlaceholder").selected = true;
            }
        break;
    }
    setTimeout(function(){
        card.style.opacity = 1;
        card.style.display = "block";
    }, 0);
}

function ocultarCard(rapido) {
    if (rapido == true) {
        card.style.display = "none";
    } else {
        var intervalID = setInterval(function () {
            if (card.style.opacity > 0) {
                card.style.opacity -= 0.1;
            } 
            
            else {
                clearInterval(intervalID);
            }
        }, 5);
        
        setTimeout(function(){
            card.style.display = "none";
        }, 150);
    }
}

function mostrarOcultarTabla(tabla, id) {
    idDiv = "recolectas"+tabla+id;
    displayElemento = document.getElementById(idDiv).style.display;
    boton = document.getElementById("botonTabla"+tabla+id);

    if (displayElemento == "none") {
        document.getElementById(idDiv).style.display = "block";
        boton.setAttribute("alt", "Ocultar recolectas");
    } else {
        if (displayElemento == "block"){
            document.getElementById(idDiv).style.display = "none";
            boton.setAttribute("alt", "Ver recolectas");
        }
    }
}

function mostrarOcultarEditFoto(noBorrar) {
    if (noBorrar) {
        document.getElementById("borrarFoto").value = 0;
    }
    setTimeout(function(){
        if (document.getElementById("divEditFoto").style.display == "block") {
            document.getElementById("divEditFoto").style.display = "none";
        } else {
            document.getElementById("divEditFoto").style.display = "block";
        }
    }, 0);
}

function borrarFotoPerro() {
    document.getElementById("borrarFoto").value = 1;
}

function seleccionarFila(id) {
    fila = document.getElementById(id);
    checkbox = document.getElementById("checkbox" + id);

    if (checkbox.checked) {
        fila.classList.add('clicado');
    } else {
        fila.classList.remove('clicado');
    }

    if (todoSelected(document.getElementsByClassName("filaTabla"))) {
        document.getElementById("seleccionarTodo").checked = true;  
    } else {
        document.getElementById("seleccionarTodo").checked = false;
    }
}

function todoSelected(filas) {
    var todosSelect = true;
    for (const i in filas) {
        if (Object.hasOwnProperty.call(filas, i)) {
            const elemento = filas[i];
            if (!document.getElementById("checkbox" + elemento.id).checked) {
                todosSelect = false;
            }
        }
    }
    return todosSelect;
}

function selectAll() {
    filas = document.getElementsByClassName("filaTabla");

    selec = todoSelected(filas);

    for (const i in filas) {
        if (Object.hasOwnProperty.call(filas, i)) {
            const fila = filas[i];
            if (selec) {
                fila.classList.remove('clicado');
                document.getElementById("seleccionarTodo").checked = false;
                document.getElementById("checkbox"+fila.id).checked = false;
            } else {
                fila.classList.add('clicado');
                document.getElementById("seleccionarTodo").checked = true;  
                document.getElementById("checkbox"+fila.id).checked = true;  
            }
        }
    }
}

function borrarSeleccionado() {
    filasSeleccionadas = document.getElementsByClassName("clicado");
    ir = "../util/borrarRecolecta.php";
    for (const i in filasSeleccionadas) {
        if (Object.hasOwnProperty.call(filasSeleccionadas, i)) {
            const fila = filasSeleccionadas[i];
            if (i == 0) {
                ir = ir + "?" + i + "=" + fila.id;
            } else {
                ir = ir + "&" + i + "=" + fila.id;
            }
        }
    }
    ir = ir + "&borrarMuchos=true";
    if (filasSeleccionadas.length > 0) {
        window.location.href = ir;
    }
}