<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "colegioweb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo "Error en la conexión";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table = $_POST['table'];
    $ID = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM $table WHERE id = ?");
    $stmt->bind_param("i", $ID);
    
    if ($stmt->execute()) {
        echo "Registro eliminado con éxito";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
}
$conn->close();
?>