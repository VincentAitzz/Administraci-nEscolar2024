<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "colegioweb_vpmprt";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $RUT = $_POST['rut'];
    
    if (!empty($RUT)) {
        $sql = "DELETE FROM apoderado WHERE RUT='$RUT'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Registro eliminado con éxito";
        } else {
            echo "Error al eliminar el registro: " . $conn->error;
        }
    } else {
        echo "Ingrese el RUT del apoderado a eliminar";
    }
}

$conn->close();
?>
