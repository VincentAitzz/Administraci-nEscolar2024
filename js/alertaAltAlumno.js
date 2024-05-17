document.getElementById('Editar').addEventListener('click', function(event) {
    event.preventDefault();

    var id = document.querySelector('input[name="id"]').value;
    var rut = document.querySelector('input[name="rut"]').value;
    var nombre = document.querySelector('input[name="nombre"]').value;
    var apellidos = document.querySelector('input[name="apellidos"]').value;
    var edad = document.querySelector('input[name="edad"]').value;
    var promedio = document.querySelector('input[name="promedio"]').value;
    var apoderado = document.querySelector('select[name="apoderado"]').value;
    var curso = document.querySelector('select[name="curso"]').value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../actionsPhp/altAlumno.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (this.status == 200) {
            if (this.responseText.trim() === "Registro actualizado con éxito") {
                alert(this.responseText);
                fetchData('../actionsPhp/IdAlumno.php', data => {
                    renderTable(data, 0, itemsPerPage);
                    renderPagination(data, itemsPerPage);
                });
            } else {
                alert(this.responseText);
            }
        }
    };
    xhr.send('id=' + id + '&rut=' + rut + '&nombre=' + nombre + '&apellidos=' + apellidos + '&edad=' + edad + '&promedio=' + promedio + '&apoderado=' + apoderado + '&curso=' + curso);
});
