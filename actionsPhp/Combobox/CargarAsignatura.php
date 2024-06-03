<?php
// Conexión a la base de datos
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "colegioweb";

$conn = new mysqli($server, $user, $pass, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar: " . $conn->connect_error);
}

// Consulta para obtener los nombres de las asignaturas
$sql = "SELECT Nombre FROM Asignatura";
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Recorrer los resultados y mostrar los nombres de las asignaturas como opciones de selección
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['Nombre'] . "'>" . $row['Nombre'] . "</option>";
    }
} else {
    // Si no hay resultados, mostrar un mensaje indicando que no hay asignaturas disponibles
    echo "<option value=''>No hay asignaturas disponibles</option>";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
