document.getElementById('Eliminar').addEventListener('click', function(event) {
    event.preventDefault();
    var id = document.querySelector('input[name="id"]').value;
    if (!id) {
        alert('Por favor, introduce un ID.');
        return;
    }
    var confirmation = confirm('¿Estás seguro de que quieres eliminar el registro Numero: ' + id + '?');
    if (!confirmation) {
        return;
    }
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../actionsPhp/delEmpleado.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (this.status == 200) {
                alert(this.responseText);
        }
    };
    xhr.send('id=' + id);
});