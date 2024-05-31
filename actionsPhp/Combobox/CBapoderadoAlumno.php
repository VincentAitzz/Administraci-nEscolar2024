<?php
// Conexión a la base de datos
$servername = "localhost"; // Nombre del servidor
$username = "root"; // Nombre de usuario de la base de datos
$password = ""; // Contraseña de la base de datos
$dbname = "ColegioWeb"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los apoderados
$sql = "SELECT ID, Nombre FROM Apoderado";
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Imprimir opciones del combobox
    while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["ID"] . "'>" . $row["Nombre"] . "</option>";
    }
} else {
    echo "<option value=''>No hay apoderados disponibles</option>";
}

// Cerrar conexión
$conn->close();
?>
