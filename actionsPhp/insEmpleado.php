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
    $RUT = $_POST['rut'];
    $Nombre = $_POST['nombre'];
    $Apellido = $_POST['apellidos'];
    $Cargo = $_POST['cargo'];
    $TipoContrato = $_POST['tipoContrato'];
    $Estado = $_POST['estadoContrato'];
    $Contacto = $_POST['contacto'];
    
        $stmt = $conn->prepare("INSERT INTO empleados(RUT,Nombre,Apellidos,Cargo,TipoContrato,Estado,Contacto) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $RUT, $Nombre, $Apellido, $Cargo, $TipoContrato, $Estado, $Contacto);

        if ($stmt->execute()) {
            echo "Registro insertado con éxito";
        } else {
            echo "Error al insertar el registro: " . $conn->error;
        }
}
$conn->close();
?>
