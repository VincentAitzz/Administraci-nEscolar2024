$(document).ready(function(){
    // Detectar clic en el botón de editar
    $('#btnEditar').click(function(){
        // Obtener los valores de los campos de texto
        var id = $('#IDCurso').val();
        var numeroAlumnos = $('#NumeroAlumnos').val();
        var nivel = $('#nivel').val();
        var letra = $('#Letra').val();

        // Realizar la solicitud AJAX para actualizar los datos
        $.ajax({
            url: "../actionsPhp/Curso/EditarCurso.php",
            type: "POST",
            data: {
                id: id,
                NumeroAlumnos: numeroAlumnos,
                nivel: nivel,
                Letra: letra
            },
            success: function(response){
                // Mostrar la respuesta del servidor en un mensaje
                alert(response);
                // Actualizar la tabla si la operación fue exitosa
                if(response.includes("éxito")){
                    cargarTabla();
                }
            },
            error: function(xhr, status, error){
                // Manejar errores si la solicitud falla
                console.error(xhr.responseText);
            }
        });
    });
});
