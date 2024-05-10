document.getElementById('dataForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var rut = document.querySelector('input[name="rut"]').value;
    var nombre = document.querySelector('input[name="nombre"]').value;
    var apellidos = document.querySelector('input[name="apellidos"]').value;
    var contacto = document.querySelector('input[name="contacto"]').value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../actionsPhp/insApoderado.php', true);
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
    xhr.send('rut=' + rut + '&nombre=' + nombre + '&apellidos=' + apellidos + '&contacto=' + contacto);
});