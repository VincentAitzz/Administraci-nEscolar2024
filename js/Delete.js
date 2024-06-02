document.getElementById('Editar').addEventListener('click', function(event){
    event.preventDefault();
})
var $Tabla = document.querySelector('input[id="nombreTabla"]').value;

switch($Tabla){
    case 'Curso':
        var nivel = document.querySelector('select[name="nivel"]').value;
        var letra = document.querySelector('select[name="letra"]').value;
        var NumeroAlumnos = document.querySelector('input[name="NumeroAlumnos"]').value;

        // Codificación de datos a JSON
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../actionsPhp/Update.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (this.status == 200) {
                    alert(this.responseText);
            }
        };
}