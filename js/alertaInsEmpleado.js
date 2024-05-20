document.getElementById('dataForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var id = document.querySelector('input[name="id"]').value;
    var rut = document.querySelector('input[name="rut"]').value;
    var nombre = document.querySelector('input[name="nombre"]').value;
    var apellidos = document.querySelector('input[name="apellidos"]').value;
    var cargo = document.querySelector('select[name="cargo"]').value;
    var tipoContrato = document.querySelector('input[name="tipo-contrato"]').checked ? 'Definido' : 'Indefinido';
    var estadoContrato = document.querySelector('input[name="estado-contrato"]').checked ? 'Activo' : 'Inactivo';
    var contacto = document.querySelector('input[name="contacto"]').value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../actionsPhp/insEmpleado.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (this.status == 200) {
            if (this.responseText.trim() === "Registro insertado con éxito") {
                alert(this.responseText);
            } else {
                alert(this.responseText);
            }
        }
    };
    
    xhr.send('id=' + id + '&rut=' + rut + '&nombre=' + nombre + '&apellidos=' + apellidos + '&cargo=' + cargo + '&tipoContrato=' + tipoContrato + '&estadoContrato=' + estadoContrato + '&contacto=' + contacto);
});
