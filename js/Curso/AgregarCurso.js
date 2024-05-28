
$(document).ready(function(){
    // Función para cargar la tabla al cargar la página
    cargarTabla();

    $("#btnAgregar").click(function(){
        // Capturar los datos del formulario
        var numeroAlumnos = $("#NumeroAlumnos").val();
        var nivel = $("#nivel").val();
        var letra = $("#Letra").val();

        // Realizar la solicitud AJAX para agregar el curso
        $.ajax({
            url: "../actionsPhp/Curso/agregarCurso.php",
            type: "POST",
            data: {
                NumeroAlumnos: numeroAlumnos,
                nivel: nivel,
                Letra: letra
            },
            success: function(response){
                // Mostrar la respuesta del servidor en un mensaje
                alert(response);
                // Recargar la tabla
                cargarTabla();
            },
            error: function(xhr, status, error){
                // Manejar errores si la solicitud falla
                console.error(xhr.responseText);
            }
        });
    });
})
