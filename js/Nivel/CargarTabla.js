// Esta función se encarga de cargar la tabla de niveles
function cargarTabla() {
    $.ajax({
        url: '../actionsPhp/Nivel/TablaNivel.php', // Ruta al script PHP que creamos anteriormente
        type: 'GET',
        success: function(response) {
            $('#tablebody').html(response); // Inserta el HTML de la tabla en el tbody con id "tablebody"
        },
        error: function(xhr, status, error) {
            console.error("Error al cargar la tabla: " + error); // Manejo de errores
        }
    });
}

// Llamamos a la función al cargar la página
$(document).ready(function() {
    cargarTabla();
});
