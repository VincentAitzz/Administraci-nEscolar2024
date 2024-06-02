document.getElementById('Eliminar').addEventListener('click', function(event){
    event.preventDefault();

    var $Tabla = document.querySelector('input[id="nombreTabla"]').value;

    switch($Tabla){
        case 'Curso':
            var id = document.querySelector('input[name="id"]').value;

            var datos = {
                tabla: $Tabla,
                id: id
            };

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../actionsPhp/Delete.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function(){
                alert(this.responseText);
            };
            xhr.send(JSON.stringify(datos));
            
            break;
        
        case 'Alumno':
            var id = document.querySelector('input[name="id"]').value;

            var datos = {
                tabla: $Tabla,
                id: id
            };

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../actionsPhp/Delete.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function(){
                alert(this.responseText);
            };
            xhr.send(JSON.stringify(datos));
            
            break;
        case 'Apoderado':
            var id = document.querySelector('input[name="id"]').value;

            var datos = {
                tabla: $Tabla,
                id: id
            };

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../actionsPhp/Delete.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function(){
                alert(this.responseText);
            };
            xhr.send(JSON.stringify(datos));
            
            break;
        case 'Empleado':
            var id = document.querySelector('input[name="id"]').value;

            var datos = {
                tabla: $Tabla,
                id: id
            };

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../actionsPhp/Delete.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function(){
                alert(this.responseText);
            };
            xhr.send(JSON.stringify(datos));
            
            break;
        case 'Clase':
            var id = document.querySelector('input[name="id"]').value;

            var datos = {
                tabla: $Tabla,
                id: id
            };

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../actionsPhp/Delete.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function(){
                alert(this.responseText);
            };
            xhr.send(JSON.stringify(datos));
            
            break;
        case 'Asignatura':
            var id = document.querySelector('input[name="id"]').value;

            var datos = {
                tabla: $Tabla,
                id: id
            };

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../actionsPhp/Delete.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function(){
                alert(this.responseText);
            };
            xhr.send(JSON.stringify(datos));
            
            break;
        case 'Nivel':
            var id = document.querySelector('input[name="id"]').value;

            var datos = {
                tabla: $Tabla,
                id: id
            };

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../actionsPhp/Delete.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function(){
                alert(this.responseText);
            };
            xhr.send(JSON.stringify(datos));
            
            break;
        default:
        alert("Tabla desconocida");
    }
});
