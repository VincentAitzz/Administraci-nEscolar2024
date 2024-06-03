document.getElementById('Limpiar').addEventListener('click', function(event){
    event.preventDefault();

    var $Tabla = document.querySelector('input[id="nombreTabla"]').value;

    switch($Tabla){
        case 'Apoderado':
            limpiarCamposApoderado();
            break;
        case 'Clase':
            limpiarCamposClase();
            break;
        case 'Curso':
            limpiarCamposCurso();
            break;
        case 'Empleado':
            limpiarCamposEmpleado();
            break;
        case 'Alumno':
            limpiarCamposAlumnos();
            break;
        case 'nivel':
            limpiarCamposNivel();
            break;
        case 'Asignatura':
            limpiarCamposAsignatura();
            break;
    }
});
function limpiarCamposAsignatura() {
    // Limpiar campos específicos para la tabla 'Asignatura'
    document.querySelector('input[name="id"]').value = '';
    document.querySelector('input[name="Nombre"]').value = '';
    document.querySelector('select[name="Profesor"]').selectedIndex = 0;

    // Llamar a la función genérica para limpiar los campos restantes
    limpiarCamposGenerales();
}

function limpiarCamposClase() {
    // Limpiar campos específicos para la tabla 'Clase'
    document.querySelector('input[name="id"]').value = '';
    document.querySelector('select[name="Nombre"]').selectedIndex = 0;
    document.querySelector('select[name="Profesor"]').selectedIndex = 0;
    document.querySelector('select[name="Curso"]').selectedIndex = 0;
    document.querySelector('input[name="Aula"]').value = '';
    document.querySelector('input[name="Fecha"]').value = '';

    // Llamar a la función genérica para limpiar los campos restantes
    //limpiarCamposGenerales(); // Esta línea está causando el problema
}


function limpiarCamposApoderado() {
    // Limpiar campos específicos para la tabla 'Apoderado'
    document.querySelector('input[name="id"]').value = '';
    document.querySelector('input[name="rut"]').value = '';
    document.querySelector('input[name="nombre"]').value = '';
    document.querySelector('input[name="apellidos"]').value = '';
    document.querySelector('input[name="contacto"]').value = '';

    // Llamar a la función genérica para limpiar los campos restantes
    limpiarCamposGenerales();
}

function limpiarCamposNivel() {
    document.querySelector('input[name="id"]').value = '';
    document.querySelector('select[name="Grado"]').selectedIndex = 0;
    document.querySelector('select[name="Categoria"]').selectedIndex = 0;
    
    limpiarCamposGenerales();
}

function limpiarCamposAlumnos(){
    document.querySelector('input[name="id"]').value = '';
            document.querySelector('input[name="rut"]').value = '';
            document.querySelector('input[name="nombre"]').value = '';
            document.querySelector('input[name="apellidos"]').value = '';
            document.querySelector('input[name="edad"]').value = '';
            document.querySelector('input[name="promedio"]').value = '';
            document.querySelector('select[name="apoderado"]').selectedIndex = 0;
            document.querySelector('select[name="curso"]').selectedIndex = 0;
            limpiarCamposGenerales();
}
function limpiarCamposCurso() {
    // Limpiar campos específicos para la tabla 'Curso'
    document.querySelector('input[name="id"]').value = '';
    document.querySelector('select[name="nivel"]').selectedIndex = 0;
    document.querySelector('select[name="letra"]').selectedIndex = 0;
    document.querySelector('input[name="NumeroAlumnos"]').value = '';
    
    // Llamar a la función genérica para limpiar los campos restantes
    limpiarCamposGenerales();
}

function limpiarCamposEmpleado() {
    // Limpiar campos específicos para la tabla 'Empleado'
    document.querySelector('input[name="id"]').value = '';
    document.querySelector('input[name="rut"]').value = '';
    document.querySelector('input[name="nombre"]').value = '';
    document.querySelector('select[name="cargo"]').selectedIndex = 0;
    document.querySelector('input[name="tipo-contrato"]').checked = false;
    document.querySelector('input[name="estado-contrato"]').checked = false;
    document.querySelector('input[name="contacto"]').value = '';
    
    // Llamar a la función genérica para limpiar los campos restantes
    limpiarCamposGenerales();
}


function limpiarCamposGenerales() {
    // Limpiar campos comunes a todas las tablas (inputs de texto y checkboxes)
    const inputs = document.querySelectorAll('input[type="text"], input[type="checkbox"]');
    const selects = document.querySelectorAll('select');
    
    inputs.forEach(input => {
        if (input.type === 'text') {
            input.value = '';
        } else if (input.type === 'checkbox') {
            input.checked = false;
        }
    });
    
    selects.forEach(select => {
        select.selectedIndex = 0;
    });
}
