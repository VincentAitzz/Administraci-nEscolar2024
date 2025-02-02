<?php
// Conexión a la base de datos (ajusta los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$database = "colegioweb";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los niveles
$sql = "SELECT * FROM nivel";
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Imprimir opciones para el select
    while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["Grado"] . "'>" . $row["Grado"] . " - " . $row["Categoria"] . "</option>";
    }
} else {
    echo "<option value=''>No hay niveles disponibles</option>";
}

// Cerrar conexión
$conn->close();
?>
