<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="input-field">

        <img src="IMG/logoUsuario.png" class="logoUsuario">
        <img src="IMG/icons8-bloquear-64.png" class="logoContraseña">

        <form id="loginForm" method="post">
            <input type="text" class="inputUsu" required name="usuario">
            <label class="labelUsu">Usuario</label>
            <br>
            <input type="password" class="inputPas" required name="contraseña">
            <label class="labelPas">Contraseña</label>
            <br>
            <label class="labelLink"><a href="#" class="Link">¿Ha olvidado su Contraseña?</a></label>
            <br>
            <input type="submit" value="Login" class="btn -btn1">
        </form>
    </div>
</body>
<script src="js/alertaLogin.js"></script>
</html>