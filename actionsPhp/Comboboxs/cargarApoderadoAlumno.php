<!-- cargarApoderado.php -->
<?php
// Incluir la conexión a la base de datos (reemplaza los valores con los de tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ColegioWeb";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los apoderados
$sql = "SELECT ID, CONCAT(Nombre, ' ', Apellidos) AS NombreCompleto FROM Apoderado";
$result = $conn->query($sql);

// Generar las opciones para el combobox de apoderados
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["ID"] . "'>" . $row["NombreCompleto"] . "</option>";
    }
} else {
    echo "<option value=''>No hay apoderados</option>";
}

// Cerrar conexión
$conn->close();
?>
