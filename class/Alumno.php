<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración | Alumnos</title>
    <link rel="stylesheet" href="../css/StyleAlumno.css">
</head>
<body>
    <div class="container">
        <h2>Administracion De alumnos</h2>
    <div class="input-field">
        <!-- Rut-->
        <input type="text" id="rutAlumno" class="inputRut" required>
        <label for="rutAlumno" class="lblRut">RUT</label>
        <br>
        <!-- Nombre-->
        <input type="text" id="nombre" name="nombre" class="inputNombre" required>
        <label for="nombre" class="lblNombre">Nombre</label>
        <br>
        <!--Apellido-->
        <input type="text" id="apellidos" name="Apellidos" class="inputApellidoAlumno" required>
        <label for="apellidos" class="lblApellido">Apellidos</label>
        <br>
        <!--edad-->
        <input type="text" id="edad" name="Edad" class="inputEdadAlumno" required>
        <label for="edad" class="lblEdadAlumnos">Edad</label>
        <br>
        <!--Promedio-->
        <input type="text" id="promedio" name="Promedio" class="inputPromedioAlumno" required>
        <label for="promedio" class="lblPromedioAlumnos">Promedio</label>
        <br>
        <!--Apoderado-->
        <select id=apoderado name="apoderado">
        <option value="">Seleccionar Apoderado...</option>
        <?php include '../actionsPhp/cargarApoderado.php';?>
        </select> 
        <br>
        <!--CURSO:-->
        <select id="Curso" name="Curso" onload="">
        <option value="">Seleccionar Curso..</option>
        </select>
    <a href="../HUB.php">Volver</a>
</body>

</html> 