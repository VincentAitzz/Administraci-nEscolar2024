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
    $Contacto = $_POST['contacto'];
    
    if (!empty($RUT) && !empty($Nombre) && !empty($Apellido) && !empty($Contacto)) {
        $sql = "INSERT INTO apoderado(RUT,Nombre,Apellidos,Contacto) VALUES ('$RUT','$Nombre','$Apellido','$Contacto');";
        if ($conn->query($sql) === TRUE) {
            echo "Registro insertado con éxito";
        } else {
            echo "Error al insertar el registro: " . $conn->error;
        }
    } else {
        echo "Ingrese Datos";
    }
}
$conn->close();
?>