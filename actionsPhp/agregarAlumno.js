$(document).ready(function() {
    $('#btnAgregar').click(function() {
        agregarAlumno();
    });
});

function agregarAlumno() {
    var rut = $('#rutAlumno').val();
    var nombre = $('#nombre').val();
    var apellidos = $('#apellidos').val();
    var edad = $('#edad').val();
    var promedio = $('#promedio').val();
    var apoderado = $('#apoderado').val();
    var curso = $('#cursoAlumnos').val();

    // Verificar que los campos obligatorios no estén vacíos
    if (rut === "" || nombre === "" || apellidos === "" || edad === "" || promedio === "" || apoderado === "" || curso === "") {
        alert("Por favor, complete todos los campos.");
        return;
    }

    // Objeto con los datos del alumno
    var datos = {
        rut: rut,
        nombre: nombre,
        apellidos: apellidos,
        edad: edad,
        promedio: promedio,
        apoderado: apoderado,
        curso: curso
    };

    // Realizar la solicitud AJAX para agregar el alumno
    $.ajax({
        url: 'http://localhost/Administraci-nEscolar2024/actionsPhp/agregarAlumno.php',
        type: 'POST',
        data: datos,
        success: function(response) {
            alert("Alumno agregado correctamente");
            console.log(response);
            // Actualizar la tabla de alumnos
            //cargarTablaAlumnos();
        },
        error: function() {
            alert("Error al agregar alumno");
        }
    });
}

/*// Función para cargar la tabla de alumnos
function cargarTablaAlumnos() {
    $.ajax({
        url: '../actionsPhp/cargarAlumnos.php',
        method: 'GET',
        success: function(response) {
            $('#tableBody').html(response);
        },
        error: function() {
            alert("Error al cargar la tabla de alumnos.");
        }
    });
    
}*/
