<?php
// Verificar si se recibió un ID válido del alumno a eliminar
if (isset($_POST['ID'])) {
    // Incluir la conexión a la base de datos (reemplaza los valores con los de tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "colegioweb";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener el ID del alumno a eliminar
    $ID = $_POST['ID'];

    // Preparar y ejecutar la consulta del procedimiento almacenado para eliminar alumno
    $stmt = $conn->prepare("CALL EliminarAlumno(?)");
    $stmt->bind_param("i", $ID);
    $stmt->execute();

    // Verificar si la eliminación fue exitosa
    if ($stmt) {
        echo "Alumno eliminado correctamente.";
    } else {
        echo "Error al eliminar alumno: " . $conn->error;
    }

    // Cerrar declaración y conexión
    $stmt->close();
    $conn->close();
}
?>
