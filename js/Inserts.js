document.getElementById('Ingresar').addEventListener('click', function(event) {
    event.preventDefault();
    //Variable de nombre de tabla para el switch
    var $Tabla = document.querySelector('input[id="nombreTabla"]').value;
    switch ($Tabla){
        case 'Empleado':
        //  Extraccion de datos del formulario
            var rut = document.querySelector('input[name="rut"]').value;
            var nombre = document.querySelector('input[name="nombre"]').value;
            var apellidos = document.querySelector('input[name="apellidos"]').value;
            var cargo = document.querySelector('select[name="cargo"]').value;
            var tipoContrato = document.querySelector('input[id="switch-contrato"]').checked ? 'Definido' : 'Indefinido';
            var estadoContrato = document.querySelector('input[id="switch-estado"]').checked ? 'Activo' : 'Inactivo';
            var contacto = document.querySelector('input[name="contacto"]').value;

            //Codificacion de datos a json
            var datos = {
                tabla: $Tabla,
                rut: rut,
                nombre: nombre,
                apellidos: apellidos,
                cargo: cargo,
                tipoContrato: tipoContrato,
                estadoContrato: estadoContrato,
                contacto: contacto
            };

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../actionsPhp/INSERT.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                        alert(this.responseText);
                        obtenerDatos();
                        }
            xhr.send(JSON.stringify(datos));
            
            break;
            case 'Apoderado':
            // Extracción de datos del formulario
            var rut = document.querySelector('input[name="rut"]').value;
            var nombre = document.querySelector('input[name="nombre"]').value;
            var apellidos = document.querySelector('input[name="apellidos"]').value;
            var contacto = document.querySelector('input[name="contacto"]').value;

            // Codificación de datos a JSON
            var datos = {
                tabla: $Tabla,
                rut: rut,
                nombre: nombre,
                apellidos: apellidos,
                contacto: contacto
            };

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../actionsPhp/INSERT.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                alert(this.responseText);
                obtenerDatos();
            };
            xhr.send(JSON.stringify(datos));
            break;
            case 'Alumno':
            // Extracción de datos del formulario
            var rut = document.querySelector('input[name="rut"]').value;
            var nombre = document.querySelector('input[name="nombre"]').value;
            var apellidos = document.querySelector('input[name="apellidos"]').value;
            var edad = document.querySelector('input[name="edad"]').value;
            var promedio = document.querySelector('input[name="promedio"]').value;
            var apoderado = document.querySelector('select[name="apoderado"]').value;
            var curso = document.querySelector('select[name="curso"]').value;

            // Codificación de datos a JSON
            var datos = {
                tabla: $Tabla,
                rut: rut,
                nombre: nombre,
                apellidos: apellidos,
                edad: edad,
                promedio: promedio,
                apoderado: apoderado,
                curso: curso
            };

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../actionsPhp/INSERT.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                alert(this.responseText);
                obtenerDatos();
            };
            xhr.send(JSON.stringify(datos));
            
            break;

            case 'Curso':
                // Extracción de datos del formulario
                var nivel = document.querySelector('select[name="nivel"]').value;
                var letra = document.querySelector('select[name="letra"]').value;
                var NumeroAlumnos = document.querySelector('input[name="NumeroAlumnos"]').value;

                // Codificación de datos a JSON
                var datos = {
                    tabla: $Tabla,
                    nivel: nivel,
                    letra: letra,
                    NumeroAlumnos: NumeroAlumnos
                };

                var xhr = new XMLHttpRequest();
                xhr.open('POST', '../actionsPhp/INSERT.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    alert(this.responseText);
                    obtenerDatos();
                };
                xhr.send(JSON.stringify(datos));
                
                break;
                case 'Nivel':
                    // Extracción de datos del formulario
                    var grado = document.querySelector('select[name="Grado"]').value;
                    var categoria = document.querySelector('select[name="Categoria"]').value;
                
                    // Codificación de datos a JSON
                    var datos = {
                        tabla: $Tabla,
                        grado: grado,
                        categoria: categoria
                    };
                
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '../actionsPhp/INSERT.php', true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.onload = function() {
                        alert(this.responseText);
                        obtenerDatos();
                    };
                    xhr.send(JSON.stringify(datos));
                    
                    break;
            // Caso para cada tabla
            //clase,asignatura
                case 'Clase':
                    //Profesor se suipone que viene de empleado asique hace un cb;
                    var Nombre = document.querySelector('select[name="Nombre"]').value;
                    var Profesor = document.querySelector('select[name="Profesor"]').value;
                    var Curso = document.querySelector('select[name="Curso"]').value;
                    var Aula = document.querySelector('input[name="Aula"]').value;
                    var Fecha = document.querySelector('input[name="Fecha"]').value;

                    var datos={
                        tabla : $Tabla,
                        Nombre : Nombre,
                        Profesor : Profesor,
                        Curso : Curso,
                        Aula : Aula,
                        Fecha : Fecha

                    };
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '../actionsPhp/INSERT.php', true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.onload = function() {
                        alert(this.responseText);
                        obtenerDatos();
                    };
                    xhr.send(JSON.stringify(datos));
                    
                    break;
                case 'Asignatura':
                    var Nombre = document.querySelector('input[name="Nombre"]').value;
                    var Profesor = document.querySelector('select[name="Profesor"]').value;

                    var datos={
                        tabla : $Tabla,
                        Nombre : Nombre,
                        Profesor : Profesor
                    };
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '../actionsPhp/INSERT.php', true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.onload = function() {
                        alert(this.responseText);
                        obtenerDatos();
                    };
                    xhr.send(JSON.stringify(datos));
                    break;
        default:
            alert("Y la tabla?")
    }
});