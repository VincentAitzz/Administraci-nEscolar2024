<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración | Apoderados</title>

</head>
<body>
    <div class="container">
        <h2>Administración de Apoderados</h2>
        <form class="input-field" action="InsertApoderado.php" method="POST">
            <input type="text" id="rut" name="rut" class="inputRUT" required>
            <label class="lblRUT">RUT</label>
            <br>
            <input type="text" id="nombre" name="nombre" class="inputNombre" required>
            <label class="lblNombre">Nombre</label>
            <br>
            <input type="text" id="apellidos" name="apellidos" class="inputApellido" required>
            <label class="lblApellido">Apellido</label>
            <br>
            <input type="text" id="contacto" name="contacto" class="inputContacto" required>
            <label class="lblContacto">Contacto</label>
            <br>
            <div class="buttonsCRUD">
                <input type="submit" value="Ingresar" class="btnCRUD">
                <button class="btnCRUD" type="button">Editar</button>
                <button class="btnCRUD" type="button">Eliminar</button>
            </div>
        </form>
    </div>
    <div class="input-field2">
        <input type="text" class="inputBus" required>
        <label class="lblBus">Buscador</label>
    </div>
    <table id="tabla-apoderados">
        <thead>
            <tr>
                <th>ID</th>
                <th>RUT</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Contacto</th>
            </tr>
        </thead>
        <tbody id="tableBody"></tbody>
    </table>
    <div id="pagination" class="paginacion"></div>
    <script src="js/Pagination.js"></script>
    <div class="btnVolver">
        <a href="../HUB.php" class="btn -btnVolver">Volver</a>
    </div>
</body>
</html>