<?php
// Establecer conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "colegioweb"; // Cambia esto al nombre de tu base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos de la tabla Curso
$sql = "SELECT ID, Nivel, Letra, NumeroAlumnos FROM Curso";
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Crear la tabla HTML
    echo "<table>
    <tr>
        <th>ID</th>
        <th>Nivel</th>
        <th>Letra</th>
        <th>Número de Alumnos</th>
    </tr>";
    // Imprimir filas de datos
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row["ID"]."</td>
        <td>".$row["Nivel"]."</td>
        <td>".$row["Letra"]."</td>
        <td>".$row["NumeroAlumnos"]."</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
$conn->close();
?>
