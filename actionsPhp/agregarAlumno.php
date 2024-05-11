<?php
// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar los valores del formulario
    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $promedio = $_POST['promedio'];
    $apoderado = $_POST['apoderado'];
    $curso = $_POST['curso'];

    // Conectar a la base de datos
    $conexion = new mysqli("localhost", "root", "", "colegioweb");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Connection failed: " . $conexion->connect_error);
    }

    // Llamar al Procedimiento ALMACENADO
    $Agregar = "CALL InsertarAlumno(?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($Agregar);
    $stmt->bind_param("ssssdsi", $rut, $nombre, $apellidos, $edad, $promedio, $apoderado, $curso);


    // Ejecutar la consulta preparada
    $stmt->execute();

    // Verificar si se agregó correctamente
    if ($stmt->affected_rows > 0) {
        echo "Alumno agregado correctamente.";
    } else {
        echo "Error al agregar alumno.";
    }

    // Cerrar la consulta preparada y la conexión
    $stmt->close();
    $conexion->close();
}
?>