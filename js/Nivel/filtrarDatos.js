function filtrarDatos() {
    var campo = document.querySelector('select[name="camposDisponibles"]').value;
    var busqueda = document.querySelector('.inputBus').value.toLowerCase();

    if (busqueda === '') {
        mostrarPagina(paginaActual);
    } else {
        var datosFiltrados = datos.filter(function(fila) {
            return fila[campo].toLowerCase().includes(busqueda);
        });
        mostrarPagina(1, datosFiltrados);
    }
}
