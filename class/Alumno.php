<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración | Alumnos</title>
    <link rel="stylesheet" href="../css/StyleAlumno.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='../actionsPhp/agregarAlumno.js'></script>
    <link rel="stylesheet" href="../css/loader.css">
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/Class.css">
    <link rel="stylesheet" href="../css/checkBox.css">
    <link rel="stylesheet" href="../css/textFields.css">
    <link rel="stylesheet" href="../css/comboBox.css">
    <link rel="stylesheet" href="../css/buttons.css">
</head>
<body>
    <div class="contenedorMaster">
        <h2>Administracion De alumnos</h2>
            <div class="input-field">
                <input type="text" id="id" class="" disabled>
                <label for="rutAlumno" class="lblID">ID</label>
                <br>
                <input type="text" id="rut" class="rut" required>
                <label for="rutAlumno" class="lblRut">RUT</label>
                <br>
                <!-- Nombre-->
                <input type="text" id="nombre" name="nombre" class="nombre" required>
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
                <select id="apoderado" name="apoderado">
                <option value="">Seleccionar Apoderado...</option>
                <?php include '../actionsPhp/cargarApoderado.php'; ?>
                </select>
                <br>
                <!--CURSO:-->
                <select id="cursoAlumnos" name="cursoAlumnos">
                        <option value="">Seleccione Curso...</option>
                        <?php include '../actionsPhp/cbCurso.php';?>
                </select>
                <br>
                <div class="buttonsCRUD">
                    <!-- Botón para agregar un Alumno -->
                    <button class="btnCRUDD" id="btnAgregar" onclick="agregarAlumno()">Agregar</button>
                    
                    <!-- Botón para Editar un alumno -->
                    <button class="btnCRUDD" type="button">Editar</button>
                    
                    <!-- Botón para Eliminar un alumno -->
                    <button class="btnCRUDD" type="button">Eliminar</button>
                </div>
            
        </div>
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
                <tbody>
                    <?php include '../actionsPhp/cargarAlumno.php'?>
                </tbody>
            </table>
            <div class="btnVolver">
        <a href="../HUB.php" class="btn -btnVolver">Volver</a>
    </div>
</body>

</html> 