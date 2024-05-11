<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "colegioweb";

$conexion = new mysqli($server, $user, $pass, $db);
if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

$sql = "SELECT * FROM Alumnos";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
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
    echo "<tr><td colspan='8'>No hay alumnos disponibles</td></tr>";
}
?>