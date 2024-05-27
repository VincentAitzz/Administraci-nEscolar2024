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
    $RUT = $_POST['rut'];
    $Nombre = $_POST['nombre'];
    $Apellido = $_POST['apellidos'];
    $Contacto = $_POST['contacto'];
    
    if (!empty($RUT) && !empty($Nombre) && !empty($Apellido) && !empty($Contacto)) {
        $stmt = $conn->prepare("UPDATE Alumno SET RUT=?, Nombre=?, Apellidos=?, Contacto=? WHERE ID =?");
        $stmt->bind_param("sssss", $RUT, $Nombre, $Apellido, $Contacto, $ID);

        if ($stmt->execute()) {
            echo "Registro actualizado con éxito";
        } else {
            echo "Error al actualizar el registro: " . $conn->error;
        }
    } else {
        echo "Ingrese Datos";
    }
}
$conn->close();
?>