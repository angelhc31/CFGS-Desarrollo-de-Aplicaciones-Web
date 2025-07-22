const container = document.querySelector('.container');
const resultado = document.querySelector('#resultado');
const formulario = document.querySelector('#formulario');

//document.addEventListener('DOMContentLoaded', obtenerDatos); 
window.addEventListener('load', () => {
    formulario.addEventListener('submit', buscarClima);
})

function buscarClima(e) {
    e.preventDefault(); //lo quiero hacer en la misma página para que no cambie el frm
    console.log("Buscando el clima");
    //validar
    let ciudad = "Las Vegas";
    let pais = "US";
    ciudad = document.querySelector("#ciudad").value;
    pais = document.querySelector("#pais").value;
    console.log(ciudad);
    console.log(pais);
    
    if (ciudad === '' || pais === '') {
        //no se ha seleccionado nada
        mostrarError('Error- Ciudad y País son obligatorios');
        return 1; //devolvemos un error

    }
    else {
            //consultar API
        consultarAPI(ciudad, pais);
    }

}


function mostrarError(mensaje) {
    console.log(mensaje);

    const alerta = document.querySelector('.bg-red-100');
    if (!alerta) {
        const alerta = document.createElement('div');
        alerta.classList.add('bg-red-100', 'border-red-400', 'text-red-700', 'px-4', 'py-3', 'rounded', 'max-w-md', 'mx-auto', 'mt-6', 'text-center');
        alerta.innerHTML = `
            <strong class="font-bold">Error!</strong>
            <span class="block">${mensaje}</span>
        `;

        container.appendChild(alerta);
    }
    
}

function consultarAPI(ciudad, pais) {
    //https://openweathermap.org/current
    //api.openweathermap.org/data/2.5/weather?q={city name}&appid={API key}
    const API = "6cbcdcbbf86b510afcdb127ab5e7a376";
    let url = `https://api.openweathermap.org/data/2.5/weather?q=${ciudad}, ${pais}}&appid=${API}`;
    console.log(url);

    fetch(url)
        .then(respuesta => respuesta.json())
        .then(datos => {
            limpiarHTML();
            console.log(datos);

            if (datos.cod === "404") {
                mostrarError("Ciudad no encontrada");
                return 1; //fallo
            }

            mostrarClima(datos);
        })
}

function mostrarClima(datos) {
    const { main: { temp, temp_max, temp_min } } = datos;
    const centigrados = temp - 273.15;//para pasar a celsiuis 
    console.log(centigrados);
    const actual = document.createElement('p');
    actual.innerHTML = `${centigrados} &#8451;`
    actual.classList.add('font-bold', 'text-6xl');

    const resultadoDiv = document.createElement('div');
    resultadoDiv.classList.add('text-center', 'text-white');
    resultadoDiv.appendChild(actual);

    resultado.appendChild(resultadoDiv);
}

function limpiarHTML() {
    while (resultado.firstChild) {
        resultado.removeChild(resultado.firstChild);
    }
}