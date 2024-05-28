<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "colegioweb";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID = $_POST['id'];

    if (!empty($ID)) {
        // Preparar y ejecutar la consulta SQL para eliminar el curso
        $stmt = $conn->prepare("DELETE FROM Curso WHERE ID = ?");
        $stmt->bind_param("i", $ID);

        if ($stmt->execute()) {
            echo "Registro eliminado con éxito";
        } else {
            echo "Error al eliminar el registro: " . $stmt->error;
        }
    } else {
        echo "ID no válido";
    }
}

// Cerrar conexión
$conn->close();
?>
