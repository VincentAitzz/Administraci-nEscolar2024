<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "colegioweb_vpmprt";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo "A";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    $sql = "SELECT * FROM Empleados WHERE Nombre LIKE'$usuario' AND Contrasenia='$contraseña'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: ../HUB.php");
        exit;
    } else {
        echo "Los datos ingresados no existen dentro de la base de datos.";
    }
}
$conn->close();
?>
