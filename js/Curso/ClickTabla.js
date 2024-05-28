$(document).ready(function(){
    // Detectar clic en las celdas de la tabla
    $('#tabla-curso tbody').on('click', 'tr', function(){
        // Obtener los valores de las celdas de la fila seleccionada
        var rowData = $(this).children('td').map(function(){
            return $(this).text();
        }).get();
        // Colocar los valores en los campos correspondientes
        $('#IDCurso').val(rowData[0]);
        $('#nivel').val(rowData[1]);
        $('#Letra').val(rowData[2]);
        $('#NumeroAlumnos').val(rowData[3]);
    });
});
