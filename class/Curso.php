<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración | Curso</title>
    <link rel="stylesheet" href="../css/StyleCurso.css">
</head>
<body>
    <div class="container">
        <h2>Administración de Curso</h2>
        <div class="input-field">
            <!-- ID CURSO PARA ACTUALIZAR/ELIMINAR-->
            <input type="text" id="IDCurso" class="inputIDCurso" required>
            <label for="IDCurso" class="lblIDCurso">ID Curso</label>
            <br>
            <!--Numero de alumnos Curso-->
            <input type ="text" id="NumeroAlumnos" class="inputNumAlumnos" required>
            <label for="NumeroAlumnos" class="lblNumeroAlumnos">Numero de Alumnos</label>
            <!--Combo box nivel-->
            <select id="nivel" name="nivel" required>
            <option value="">Seleccione nivel...</option>
            <?php include '../actionsPhp/cargarNivel.php';?>
            </select>
            <br>
            <!--Letra Curso-->
            <select id="Letra" name="letra">
                <option value="">Seleccione letra...</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
                
            </select>
            <br>
            
        <!--Termina el container-->
        <!--Botones-->
            <div class="buttons">
                <button class="btnCRUDD" id="btnAgregar">Agregar</button>
                <button class="btnCRUDD" id="btnEditar">Editar</button>
                <button class="btnCRUDD" id="btnEliminar">Eliminar</button>
                <br>
            </div>
        </div>
    </div>
    <div class="input-field2">
        <input type="text" class="inputBuscar" required>
        <label for="inputBuscar" class="lblBuscar">Buscador</label>
        <br> 
    </div>
    <!-- Tabla -->   
    <div class="tabla">
        <table id="tabla-curso">
            <tr>
                <th>ID</th>
                <th>Nivel</th>
                <th>Letra</th>
                <th>Numero Alumnos</th>
            </tr>
        </table>
    <!--Volver boton-->
    <div class="btnVolver">
        <a href="../HUB.php" class="btn -btnVolver">Volver</a>
    </div>
</body>
</html>