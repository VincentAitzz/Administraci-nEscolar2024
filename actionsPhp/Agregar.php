<?php
//AGREGAR ALUMNO
// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Obtener datos del formulario
    $RUT = $_POST['RUT'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellidos'];
    $Edad = $_POST['Edad'];
    $Promedio = $_POST['Promedio'];
    $Apoderado = $_POST['apoderado'];
    $Curso = $_POST['curso'];

    // Preparar y ejecutar la consulta del procedimiento almacenado para agregar alumno
    $stmt = $conn->prepare("CALL AgregarAlumno(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiidi", $RUT, $Nombre, $Apellido, $Edad, $Promedio, $Apoderado, $Curso);
    $stmt->execute();

    // Verificar si la inserción fue exitosa
    if ($stmt) {
        echo "Alumno agregado correctamente.";
    } else {
        echo "Error al agregar alumno: " . $conn->error;
    }

    // Cerrar declaración y conexión
    $stmt->close();
    $conn->close();
}
//--------------------//
//AGREGAR 
?>
