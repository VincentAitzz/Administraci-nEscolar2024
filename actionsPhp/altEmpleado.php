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
    $Cargo = $_POST['cargo'];
    $TipoContrato = $_POST['tipoContrato'];
    $Estado = $_POST['estadoContrato'];
    $Contacto = $_POST['contacto'];
    
    if (!empty($RUT) && !empty($Nombre) && !empty($Apellido) && !empty($Cargo) && !empty($TipoContrato) && !empty($Estado) && !empty($Contacto)) {
        $stmt = $conn->prepare("UPDATE empleados SET RUT=?, Nombre=?, Apellidos=?, Cargo=?, TipoContrato=?, Estado=?, Contacto=? WHERE ID =?");
        $stmt->bind_param("ssssssss", $RUT, $Nombre, $Apellido, $Cargo, $TipoContrato, $Estado, $Contacto, $ID);

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
