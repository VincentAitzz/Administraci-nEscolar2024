window.onload = function() {
    // Obtener el tipo de formulario o caso
    var formulario = obtenerTipoFormulario(); // Suponiendo que tengas una función para obtener el tipo de formulario

    // Seleccionar el combobox
    var combobox = document.querySelector('select[id="apoderado"]');

    // Llamar a combobox.php según el tipo de formulario
    switch(formulario){
        case 'alumno':
            cargarCombobox("combobox_alumno.php", combobox);
            break;
        case 'curso':
            cargarCombobox("combobox_curso.php", combobox);
            break;
        // Agregar más casos según sea necesario
        default:
            console.error("Tipo de formulario no reconocido");
            break;
    }
};

function cargarCombobox(url, combobox) {
    // Llamar a la URL utilizando AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Parsear la respuesta JSON
            var options = JSON.parse(xhr.responseText);

            // Limpiar el combobox
            combobox.innerHTML = "";

            // Agregar las opciones al combobox
            options.forEach(function(option) {
                var optionElement = document.createElement("option");
                optionElement.text = option;
                combobox.add(optionElement);
            });
        }
    };
    xhr.send();
}

function obtenerTipoFormulario() {
    var titulo = document.querySelector('h2').innerText.trim();
    if (titulo === "Administración de Alumno") {
        return 'alumno';
    } else if (titulo === "Administración de Curso") {
        return 'curso';
    }
    // Agregar más casos según sea necesario
}
