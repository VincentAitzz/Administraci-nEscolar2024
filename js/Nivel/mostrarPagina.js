function mostrarPagina(pagina, datosParaMostrar = datos) {
    var inicio = (pagina - 1) * filasporPagina;
    var fin = inicio + filasporPagina;
    var filas = datosParaMostrar.slice(inicio, fin);

    var tbody = document.getElementById('tablebody');
    tbody.innerHTML = '';

    filas.forEach(fila => {
        var tr = document.createElement('tr');
        tr.innerHTML = `<td>${fila.ID}</td><td>${fila.Grado}</td><td>${fila.Categoria}</td>`;
        tbody.appendChild(tr);
    });
}
