document.getElementById('Editar').addEventListener('click', function(event) {
    event.preventDefault();

    var id = document.querySelector('input[name="id"]').value;
    var rut = document.querySelector('input[name="rut"]').value;
    var nombre = document.querySelector('input[name="nombre"]').value;
    var apellidos = document.querySelector('input[name="apellidos"]').value;
    var contacto = document.querySelector('input[name="contacto"]').value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../actionsPhp/altApoderado.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (this.status == 200) {
            if (this.responseText.trim() === "Registro actualizado con éxito") {
                alert(this.responseText);
                fetchData('../actionsPhp/ldApoderado.php', data => {
                    renderTable(data, 0, itemsPerPage);
                    renderPagination(data, itemsPerPage);
                });
            } else {
                alert(this.responseText);
            }
        }
    };
    xhr.send('id=' + id + '&rut=' + rut + '&nombre=' + nombre + '&apellidos=' + apellidos + '&contacto=' + contacto);
});