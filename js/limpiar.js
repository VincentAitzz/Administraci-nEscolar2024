document.getElementById('Limpiar').addEventListener('click', function(event){
    event.preventDefault();

    var $Tabla = document.querySelector('input[id="nombreTabla"]').value;

    switch($Tabla){
        case 'Curso':
            limpiarCamposCurso();
            break;
        case 'Empleado':
            limpiarCamposEmpleado();
            break;
        // Agrega más casos según sea necesario para otras tablas
    }
});

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
    document.querySelector('input[name="apellidos"]').value = '';
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
