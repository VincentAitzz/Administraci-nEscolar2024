<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración | Nivel</title>
    <link rel="stylesheet" href="../css/StyleCurso.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Administracion de Niveles de Curso</h2>
        <div class="input-field">
            <!-- ID CURSO PARA ACTUALIZAR/ELIMINAR-->
        <input type="text" id="ID" class="inputID" required>
        <label for="ID" class="lblID">ID (uso de Editar/Eliminar)</label>
        <br>
        <select id="Grado" name="Grado">
            <option value="">Seleccione Grado...</option>
            <option value="1ero">1ero</option>
            <option value="2do">2do</option>
            <option value="3ero">3ero</option>
            <option value="4to">4to</option>
            <option value="5to">5to</option>
            <option value="6to">6to</option>
            <option value="7mo">7mo</option>
            <option value="8vo">8vo</option>
        </select>
        <br>
        <select id="Categoria" name="Categoria">
            <option value="">Seleccione Categoria...</option>
            <option value="Básico">Básico</option>
            <option value="Medio">Medio</option>
        </select>
        </div>
        <div class="buttons">
            <button class="btnCRUDD" id="btnAgregar">Agregar</button>
            <button class="btnCRUDD" id="btnEditar">Editar</button>
            <button class="btnCRUDD" id="btnEliminar">Eliminar</button>
            <br>
        </div>
    </div>
    <br>
    <div class="input-field2">
        <input type="text" class="inputBus" required>
        <label for="inputBuscar" class="lblBuscar">Buscador</label>
        <select name="camposDisponibles">
            <option value="ID">ID</option>
            <option value="Grado">Grado</option>
            <option value="Categoria">Categoria</option>
        </select>
        <br>
            <table id="tabla-nivel">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Grado</th>
                        <th>Categoria</th>
                    </tr>
                </thead>
                <tbody id="tablebody"></tbody>
            </table>
    </div>
    <br>
    <div id="btnPaginacion"></div>
    <div class="btnVolver">
        <a href="../HUB.php" class="btn -btnVolver">Volver</a>
    </div>
    <script src="../js/Nivel/CargarTabla.js"></script>
    <script src="../js/Nivel/mostrarPagina.js"></script>
    <script src="../js/Nivel/filtrarDatos.js"></script>
    <script src="../js/Nivel/generarBotones.js"></script>
</body>
</html>