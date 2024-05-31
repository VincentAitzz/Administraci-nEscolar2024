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
    $RUT = $_POST['rut'];
    $Nombre = $_POST['nombre'];
    $Apellido = $_POST['apellidos'];
    $Cargo = $_POST['cargo'];
    $TipoContrato = $_POST['tipoContrato'];
    $Estado = $_POST['estadoContrato'];
    $Contacto = $_POST['contacto'];

    if ($table === 'empleados') {
        $columns = "RUT,Nombre,Apellidos,Cargo,TipoContrato,Estado,Contacto";
        $values = "?, ?, ?, ?, ?, ?, ?";
    }
    
    $stmt = $conn->prepare("UPDATE $table SET $columns WHERE id = ?");
    $stmt->bind_param("i", $ID);
    
    if ($table === 'empleados') {
        $stmt->bind_param("ssssss", $RUT, $Nombre, $Apellido, $Cargo, $TipoContrato, $Estado, $Contacto);
    } 

    if ($stmt->execute()) {
        echo "Registro insertado con éxito";
    } else {
        echo "Error al insertar el registro: " . $conn->error;
    }
}
$conn->close();
?>