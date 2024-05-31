
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración | Alumno</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <div class="container">
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
                <option>Seleccione Apoderado..</option>
                <?php include '../actionsPhp/Combobox/CBapoderadoAlumno.php'?>
            </select>
            <select name="curso" id="curso">
                <option>Seleccione Curso..</option>
                <?php include '../actionsPhp/Combobox/CBCursoAlumno.php' ?>
            </select>
        </form>
    </div>
</body>
</html>