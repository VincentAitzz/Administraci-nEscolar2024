document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var usuario = document.querySelector('.inputUsu').value;
    var contraseña = document.querySelector('.inputPas').value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'actionsPhp/logicaLogin.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (this.status == 200 && this.responseText) {
            // Comprueba si la respuesta es HTML
            if (!this.responseText.trim().startsWith('<!DOCTYPE html>')) {
                alert(this.responseText);
            } else {
                // Si la respuesta es HTML, redirige a la página HUB.php
                window.location.href = 'HUB.php';
            }
        }
    };
    xhr.send('usuario=' + usuario + '&contraseña=' + contraseña);
});