// botones paginacion
function generarBotones(){
    var numeroDePaginas = Math.ceil(datos.length / filasporPagina);
    var contenedor = document.getElementById('btnPaginacion');
    
    for (var i = 1; i <= numeroDePaginas; i++) {
        var boton = document.createElement('button'); // Crear un nuevo botón
        boton.textContent = i;
        boton.addEventListener('click', function(){
            paginaActual = parseInt(this.textContent);
            mostrarPagina(paginaActual);
        });
        contenedor.appendChild(boton);
    }
}

document.querySelector('.inputBus').addEventListener('input',filtrarDatos);
obtenerDatos();