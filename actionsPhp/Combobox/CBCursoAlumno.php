<?php
// Conexión a la base de datos
$servername = "localhost"; // Cambia esto por el nombre de tu servidor si es diferente
$username = "root";
$password = "";
$database = "ColegioWeb"; // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Consulta SQL para obtener los cursos
$sql = "SELECT ID, CONCAT(Grado, ' ', Letra) AS Curso FROM Curso";
$result = $conn->query($sql);

// Si hay resultados, crear las opciones del combobox
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["ID"] . "'>" . $row["Curso"] . "</option>";
    }
} else {
    echo "<option>No hay cursos disponibles</option>";
}

// Cerrar conexión
$conn->close();
?>
