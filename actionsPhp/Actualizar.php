<?php
// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir la conexión a la base de datos (reemplaza los valores con los de tu configuración)
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "nombre_base_de_datos";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $ID = $_POST['ID'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellidos'];
    $Edad = $_POST['Edad'];
    $Promedio = $_POST['Promedio'];
    $Apoderado = $_POST['apoderado'];
    $Curso = $_POST['curso'];

    // Preparar y ejecutar la consulta del procedimiento almacenado para actualizar alumno
    $stmt = $conn->prepare("CALL ActualizarAlumno(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssidi", $ID, $Nombre, $Apellido, $Edad, $Promedio, $Apoderado, $Curso);
    $stmt->execute();

    // Verificar si la actualización fue exitosa
    if ($stmt) {
        echo "Alumno actualizado correctamente.";
    } else {
        echo "Error al actualizar alumno: " . $conn->error;
    }

    // Cerrar declaración y conexión
    $stmt->close();
    $conn->close();
}
?>
