<!--ALUMNO TABLA-->
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

// Consulta SQL para obtener los alumnos
$sql = "SELECT ID, RUT, Nombre, Apellido, Edad, PromedioGeneral, Apoderado, Curso FROM Alumnos";
$result = $conn->query($sql);

// Mostrar los datos de los alumnos en la tabla
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ID"] . "</td>";
        echo "<td>" . $row["RUT"] . "</td>";
        echo "<td>" . $row["Nombre"] . "</td>";
        echo "<td>" . $row["Apellido"] . "</td>";
        echo "<td>" . $row["Edad"] . "</td>";
        echo "<td>" . $row["PromedioGeneral"] . "</td>";
        echo "<td>" . $row["Apoderado"] . "</td>";
        echo "<td>" . $row["Curso"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>No hay alumnos</td></tr>";
}

// Cerrar conexión
$conn->close();
?>
