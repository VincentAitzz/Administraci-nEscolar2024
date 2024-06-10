document.getElementById('Editar').addEventListener('click',function(event){
    event.preventDefault();
    console.log("Botón Editar clickeado");

    var $Tabla = document.querySelector('input[id="nombreTabla"]').value;

    switch($Tabla){
        case 'Curso':
            var id = document.querySelector('input[name="id"]').value;
            var nivel = document.querySelector('select[name="nivel"]').value;
            var letra = document.querySelector('select[name="letra"]').value;
            var NumeroAlumnos = document.querySelector('input[name="NumeroAlumnos"]').value;

            var datos= {
                tabla: $Tabla,
                id : id,
                nivel : nivel,
                letra : letra,
                NumeroAlumnos : NumeroAlumnos
            };
            var xhr = new XMLHttpRequest();
            xhr.open('POST','../actionsPhp/UPDATE.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function(){
                alert(this.responseText);
                obtenerDatos();
            }
            xhr.send(JSON.stringify(datos));
            
            break;
        case 'Empleado':
            //  Extraccion de datos del formulario
            var id = document.querySelector('input[name="id"]').value;
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
                id : id,
                rut: rut,
                nombre: nombre,
                apellidos: apellidos,
                cargo: cargo,
                tipoContrato: tipoContrato,
                estadoContrato: estadoContrato,
                contacto: contacto
            };

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../actionsPhp/UPDATE.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                        alert(this.responseText);
                        obtenerDatos();
                        }
            xhr.send(JSON.stringify(datos));
            break;
            case 'Alumno':
                var id = document.querySelector('input[name="id"]').value;
                var rut = document.querySelector('input[name="rut"]').value;
                var nombre = document.querySelector('input[name="nombre"]').value;
                var apellidos = document.querySelector('input[name="apellidos"]').value;
                var edad = document.querySelector('input[name="edad"]').value;
                var promedio = document.querySelector('input[name="promedio"]').value;
                var apoderado = document.querySelector('select[name="apoderado"]').value;
                var curso = document.querySelector('select[name="curso"]').value;

                var datos = {
                    tabla : $Tabla,
                    rut : rut,
                    nombre : nombre,
                    apellidos : apellidos,
                    edad : edad,
                    promedio : promedio,
                    apoderado : apoderado,
                    curso : curso,
                    id : id
                };
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '../actionsPhp/UPDATE.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                            alert(this.responseText);
                            obtenerDatos();
                            }
                xhr.send(JSON.stringify(datos));
                break;
            case 'Apoderado':
                var id = document.querySelector('input[name="id"]').value;
                var rut = document.querySelector('input[name="rut"]').value;
                var nombre = document.querySelector('input[name="nombre"]').value;
                var apellidos = document.querySelector('input[name="apellidos"]').value;
                var contacto = document.querySelector('input[name="contacto"]').value;

                var datos={
                    tabla : $Tabla,
                    rut: rut,
                    nombre : nombre,
                    apellidos : apellidos,
                    contacto : contacto,
                    id : id
                };
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '../actionsPhp/UPDATE.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                            alert(this.responseText);
                            obtenerDatos();
                            }
                xhr.send(JSON.stringify(datos));

                break;
            case 'Asignatura':
                var id = document.querySelector('input[name="id"]').value;
                var Nombre = document.querySelector('input[name="Nombre"]').value;
                var Profesor = document.querySelector('select[name="Profesor"]').value;
                var xhr = new XMLHttpRequest();

                var datos={
                    tabla: $Tabla,
                    Nombre : Nombre,
                    Profesor : Profesor,
                    id : id
                };
                xhr.open('POST', '../actionsPhp/UPDATE.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                            alert(this.responseText);
                            obtenerDatos();
                            }
                xhr.send(JSON.stringify(datos));
                break;

            case 'Clase':
                var id = document.querySelector('input[name="id"]').value;
                var Nombre = document.querySelector('select[name="Nombre"]').value;
                var Profesor = document.querySelector('select[name="Profesor"]').value;
                var Curso = document.querySelector('select[name="Curso"]').value;
                var Aula =document.querySelector('input[name="Aula"]').value;
                var Fecha = document.querySelector('input[name="Fecha"]').value;

                var datos = {
                    tabla : $Tabla,
                    Nombre : Nombre,
                    Profesor : Profesor,
                    Curso : Curso,
                    Aula : Aula,
                    Fecha : Fecha,
                    id : id
                };
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '../actionsPhp/UPDATE.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                            alert(this.responseText);
                            obtenerDatos();
                            }
                xhr.send(JSON.stringify(datos));
                break;

            case 'Nivel':
                var id = document.querySelector('input[name="id"]').value;
                var Grado = document.querySelector('select[name="Grado"]').value;
                var Categoria = document.querySelector('select[name="Categoria"]').value;

                var datos={
                    tabla: $Tabla,
                    Grado : Grado,
                    Categoria : Categoria,
                    id : id
                }
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '../actionsPhp/UPDATE.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                            alert(this.responseText);
                            obtenerDatos();
                            }
                xhr.send(JSON.stringify(datos));
                break;
       
    }
})