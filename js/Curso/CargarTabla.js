function cargarTabla() {
    $.ajax({
        url: "../actionsPhp/Curso/TablaCurso.php", // Archivo PHP para cargar la tabla
        type: "GET",
        success: function(data){
            // Insertar los datos en la tabla
            $("#tabla-curso").html(data);
        },
        error: function(xhr, status, error){
            // Manejar errores si la solicitud falla
            console.error(xhr.responseText);
        }
    });
}