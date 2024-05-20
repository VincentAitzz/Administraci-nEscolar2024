<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "colegioweb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo "Error en la conexion";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID = $_POST['id'];
    
    $stmt = $conn->prepare("DELETE FROM empleados WHERE ID = ?");
    $stmt->bind_param("s", $ID);

    if ($stmt->execute()) {
        echo "Se ha eliminado el registro con éxito";
    } else {
        echo "No se ha podido eliminar" . $conn->error;
    }
}
$conn->close();
?>
