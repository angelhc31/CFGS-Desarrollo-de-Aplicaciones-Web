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
                }, 1);
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

function activarDatePicker(input) {
    var valor = input.value
    if (valor.includes('/')) {
        const [dia, mes, anio] = valor.split('/');
        valor = `${anio}-${mes}-${dia}`;
    }

    input.type = 'date';
    input.value = valor;

    if (input.id != "fechaFiltro") {
        const hoy = new Date().toISOString().split('T')[0];
        input.min = hoy; 
    }
}

function filtrarReservas() {
    var nombre = document.getElementById('nombreCliFiltro').value.trim();
    var fecha = document.getElementById('fechaFiltro').value.trim();
    var turno = document.getElementById('filtroTurno').value;
    var estado = document.getElementById('filtroEstado').value;

    if (fecha.includes('/')) {
        const [dia, mes, anio] = fecha.split('/');
        fecha = `${anio}-${mes}-${dia}`;
    }

    var parametros = 
    {
        "nombre" : nombre,
        "fecha" : fecha,
        "turno" : turno,
        "estado" : estado
    };

    $.ajax({
        data: parametros,
        url: 'filtrarReservas.php',
        type: 'POST',
        

        success: function(mensaje)
        {
        $('#modify-table').html(mensaje);
        }
    });
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

function seleccionarFila(id) {
    fila = document.getElementById(id);
    checkbox = document.getElementById("checkbox" + id);

    if (checkbox.checked) {
        fila.classList.add('clicado');
    } else {
        fila.classList.remove('clicado');
    }
}

function actualizarEstado(id, accion) {
    var estado = ""
    if (accion == "completar") {
        estado = document.getElementById('checkbox' + id).checked ? 1 : 0;
    }

    var parametros = 
    {
        "id": id,
        "accion": accion,
        "estado": estado
    };

    $.ajax({
        data: parametros,
        url: 'actualizarEstado.php',
        type: 'POST',
        

        success: function(mensaje)
        {
        $('#modify-table').html(mensaje);
        }
    });
}

function updateReserva(event) {
    event.preventDefault();

    // Recoger los valores del formulario
    var id = document.getElementById('idReserva').value;
    var nombre = document.getElementById('nombreCli').value;
    var telf = document.getElementById('telfCli').value;
    var personas = document.getElementById('numPersonas').value;
    var fecha = document.getElementById('fechaReserva').value;
    var hora = document.getElementById('selectHoraReserva').value;
    var observaciones = document.getElementById('observaciones').value;

    var parametros = {
        "id": id,
        "nombre": nombre,
        "telf": telf,
        "personas": personas,
        "fecha": fecha,
        "hora": hora,
        "observaciones": observaciones
    };

    $.ajax({
        data: parametros,
        url: 'updateReserva.php',
        type: 'POST',
        success: function(mensaje) {
            $('#modify-table').html(mensaje);
        }
    });

    ocultarCard(false);
}

function mostrarCard(idEdit, extraDataEdit, extraDataEdit2, extraDataEdit3, extraDataEdit4, extraDataEdit5, extraDataEdit6) {

    document.getElementById("idReserva").value = idEdit;
    document.getElementById("nombreCli").value = extraDataEdit;
    document.getElementById("telfCli").value = extraDataEdit2;
    document.getElementById("numPersonas").value = extraDataEdit3;

    document.getElementById("fechaReserva").type = 'text';
    document.getElementById("fechaReserva").value = extraDataEdit4;
    document.getElementById("selectHoraReserva").value = extraDataEdit5;
    document.getElementById("observaciones").value = extraDataEdit6;

    setTimeout(function(){
        card.style.opacity = 1;
        card.style.display = "block";
    }, 0);
}

function updateTurnosDisp(turnoSelecc) {
    fechaReserva = document.getElementById('fechaReserva').value;
    numPersonas = document.getElementById('numPersonas').value;
    idReserva = document.getElementById('idReserva').value;
    if (turnoSelecc == "") {
        turnoSelecc = document.getElementById('selectHoraReserva').value;
    }

    var parametros = 
    {
        "fechaReserva" : fechaReserva,
        "numPersonas" : numPersonas,
        "turnoSelecc" : turnoSelecc,
        "idReserva" : idReserva
    };

    $.ajax({
        data: parametros,
        url: '../util/turnosDisponibles.php',
        type: 'POST',
        

        success: function(mensaje)
        {
        $('#hora-reserva').html(mensaje);
        }
    });
}