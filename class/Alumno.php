<?php include '../actionsPhp/Agregar.php'; ?>
<?php include '../actionsPhp/Actualizar.php'; ?>
<?php include '../actionsPhp/Eliminar.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< Updated upstream
    <title>Administración | Alumnos</title>
=======
    <title>Administración | Alumno</title>
>>>>>>> Stashed changes
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <div class="container">
<<<<<<< Updated upstream
        <h2>Administracion de Alumnos</h2>
        <form id="dataForm" class="input-field" method="POST">
            <div class="campos">
            <input type="text" id="ID" class="inputID" required>
            <label  for="ID" class="lblID">ID</label>
            <br>
            </div>
            <!-- Rut-->
            <div class="campos">
            <input type="text" id="RUT" class="inputRut" required>
            <label for="RUT" class="lblRUT">RUT</label>
            <br>
            </div>
            <!-- Nombre-->
            <input type="text" id="Nombre" class="inputNombre" required>
            <label for="Nombre" class="lblNombre">Nombre</label>
            <br>
            <!-- Apellidos-->
            <input type="text" id="Apellidos" class="inputApellido" required>
            <label for="Apellidos" class="lblApellido">Apellidos</label>
            <br>
            <!-- Edad -->
            <input type="text" id="Edad" class="inputEdad" required>
            <label for="Edad" class="lblEdad">Edad</label>
            <br>
            <!-- Promedio-->
            <input type="text" id="Promedio" class="inputPromedio" required>
            <label for="Promedio" class="lblPromedio">Promedio</label>
            <br>
            <!-- Apoderado-->
            <select id="apoderado" name="apoderado">
                <option value="">Seleccionar Apoderado..</option>
                <?php include '../actionsPhp/Comboboxs/cargarApoderadoAlumno.php';?>
            </select>
            <br>
            <!-- Curso-->
            <select id="curso" name="curso">
                <option value="">Seleccione Curso..</option>
                <?php include '../actionsPhp/Comboboxs/cargarCursoAlumno.php';?>
            </select>
            <br>
            <!-- Botones -->
            <div class="buttonsCRUD">
                <input type="submit" value="Ingresar" class="btnCRUDD" id="Ingresar">
                <input type="submit" value="Editar" class="btnCRUDD" id="Editar">
                <input type="submit" value="Eliminar" class="btnCRUDD" id="Eliminar">
            </div>
        </form>
    </div>
    <div class="input-field2">
        <input type="text" class="inputBus" required>
        <label class="lblBus">Buscador</label>
        <select name="camposDisponibles">
            <option value="ID">ID</option>
            <option value="Rut">Rut</option>
            <option value="Nombre">Nombre</option>
            <option value="Apellidos">Apellidos</option>
            <option value="Edad">Edad</option>
            <option value="Promedio">Promedio</option>
            <option value="Apoderado">Apoderado</option>
            <option value="Curso">Curso</option>
        </select>
        </div>
    <table id="tabla-alumnos">
        <thead>
            <tr>
                <th>ID</th>
                <th>RUT</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>Promedio</th>
                <th>Apoderado</th>
                <th>Curso</th>
            </tr>
        </thead>
        <tbody id="tablebody"></tbody>
        <?php include '../actionsPhp/Tablas/CargarTablas.php'?>
    </table>
    <script>
        $(document).ready(function(){
    // Función para manejar el cambio en el combo box
    $('select[name="camposDisponibles"]').change(function(){
        var campo = $(this).val(); // Obtener el valor seleccionado
        var valor = $('.inputBus').val(); // Obtener el valor ingresado
        // Realizar la solicitud AJAX
        $.ajax({
            url: '../actionsPhp/Buscadores/BusAlumno.php',
            type: 'POST',
            data: {campo: campo, valor: valor},
            success: function(response){
                $('#tablebody').html(response); // Actualizar la tabla con los resultados filtrados
            }
        });
    });
});
    </script>
    <br>
    <div id="btnPaginacion"></div>
    <div class="btnVolver">
        <a href="../HUB.php" class="btn -btnVolver">Volver</a>
=======
        <h2>Administración de Alumno</h2>
        <form id ="dataForm" class="input-field" method="POST">
            <input type="" name="nombreTABLA" ID = "nombreTABLA" value="Alumno" hidden>

            <input type="" name="id" id="id" disabled>
            <label class="lblID">ID</label>
            <br>
            <input type="text" id="rut" name="rut" class="inputRut" required>
            <label class="lblRut">Rut</label>
            <br>
            <input type="text" id="nombre" name="nombre" class="inputNombre" required>
            <label class="lblNombre">Nombre</label>
            <br>
            <input type="text" id="apellidos" name="apellidos" class="inputApellidos" required>
            <label class="lblApellidos">Apellidos</label>
            <br>
            <input type="text" id="edad" name="edad" class="inputEdad" required>
            <label class="lblEdad">Edad</label>
            <br>
            <input type="text" id="promediogeneral" name="promediogeneral" class="inputPromedioG" required>
            <label class="lblPromedioG">Promedio General</label>
            <br>
            <select name="apoderado" id="apoderado">
                <option></option>
            </select>
        </form>
>>>>>>> Stashed changes
    </div>
</body>
</html>