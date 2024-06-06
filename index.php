<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/loader.css">
    <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/Class.css">
    <link rel="stylesheet" href="css/textFields.css">
    <link rel="stylesheet" href="css/buttons.css">
</head>
<body>
    <div class="contenedorLogin">
        <form id="loginForm" method="post">
            <div class="contenedorSingCamposL">
                <label class="lbl">Usuario</label>
                <input type="text" class="textField" required name="usuario">
            </div>
            <div class="contenedorSingCamposL">
                <label class="lbl">Contraseña</label>
                <input type="password" class="textField" required name="contraseña">
            </div>
            <label><a href="#" class="lblHelp">¿Ha olvidado su Contraseña?</a></label>
            <input type="submit" value="Login" class="btn">
        </form>
    </div>
</body>
<script src="js/alertaLogin.js"></script>
</html>