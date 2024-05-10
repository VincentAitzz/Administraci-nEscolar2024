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
    $ID = $_POST['id'];
    $RUT = $_POST['rut'];
    $Nombre = $_POST['nombre'];
    $Apellido = $_POST['apellidos'];
    $Contacto = $_POST['contacto'];
    
    if (!empty($RUT) && !empty($Nombre) && !empty($Apellido) && !empty($Contacto)) {
        $sql = "UPDATE apoderado SET RUT='$RUT', Nombre='$Nombre', Apellidos='$Apellido', Contacto='$Contacto' WHERE ID='$ID'";
        
        if ($conn->query($sql) === TRUE) {
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
