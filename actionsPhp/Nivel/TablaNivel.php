<?php
// Conexión a la base de datos (reemplaza los valores con los de tu conexión)
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

// Consulta SQL para obtener todos los registros de la tabla Nivel
$sql = "SELECT * FROM Nivel";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Salida de los datos de cada fila
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["ID"]."</td>";
        echo "<td>".$row["Grado"]."</td>";
        echo "<td>".$row["Categoria"]."</td>";
        echo "</tr>";
    }
} else {
    echo "0 resultados";
}
$conn->close();
?>
