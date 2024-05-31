<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ColegioWeb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el valor enviado por AJAX
$campo = $_POST['campo'];
$valor = $_POST['valor'];

// Consulta SQL dinámica según la opción seleccionada
$sql = "SELECT * FROM Alumnos WHERE $campo = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $valor);
$stmt->execute();
$result = $stmt->get_result();

// Construir la tabla HTML con los resultados filtrados
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ID"] . "</td>";
        echo "<td>" . $row["RUT"] . "</td>";
        echo "<td>" . $row["Nombre"] . "</td>";
        echo "<td>" . $row["Apellidos"] . "</td>";
        echo "<td>" . $row["Edad"] . "</td>";
        echo "<td>" . $row["PromedioGeneral"] . "</td>";
        echo "<td>" . $row["Apoderado"] . "</td>";
        echo "<td>" . $row["Curso"] . "</td>";
        // Aquí puedes añadir más columnas si es necesario
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No se encontraron resultados</td></tr>";
}

$stmt->close();
$conn->close();
?>
