document.getElementById('Ingresar').addEventListener('click', function(event) {
    event.preventDefault();

    /*
    
    Revisa los Formularios de las tablas en caso de cualquier shit
    
    */

    //Variable de nombre de tabla para el switch
    var $Tabla = document.querySelector('input[id="nombreTabla"]').value;

    switch ($Tabla){
        case 'Empleado':

        //  Extraccion de datos del formulario
            var rut = document.querySelector('input[name="rut"]').value;
            var nombre = document.querySelector('input[name="nombre"]').value;
            var apellidos = document.querySelector('input[name="apellidos"]').value;
            var cargo = document.querySelector('select[name="cargo"]').value;
            var tipoContrato = document.querySelector('input[name="tipo-contrato"]').checked ? 'Definido' : 'Indefinido';
            var estadoContrato = document.querySelector('input[name="estado-contrato"]').checked ? 'Activo' : 'Inactivo';
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
                        }
            xhr.send(JSON.stringify(datos));
            break;

        // Caso para cada tabla

        default:
            alert("Y la tabla?")
    }
});