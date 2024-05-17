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
    $RUT = $_POST['rutAlumno'];
    $Nombre = $_POST['nombre'];
    $Apellido = $_POST['apellidos'];
    $Edad = $_POST['edad'];
    $Promedio = $_POST['promedio'];
    $Apoderado = $_POST['apoderado'];
    $Curso = $_POST['cursoAlumnos'];
    
    if (!empty($RUT) && !empty($Nombre) && !empty($Apellido) && !empty($Edad) && !empty($Promedio) && !empty($Apoderado) && !empty($Curso)) {
        $sql = "INSERT INTO Alumnos(RUT, Nombre, Apellidos, Edad, Promedio, Apoderado, Curso) 
        VALUES ('$RUT', '$Nombre', '$Apellido', '$Edad', '$Promedio', '$Apoderado', '$Curso')";
        if ($conn->query($sql) === TRUE) {
            echo "Registro insertado con éxito";
        } else {
            echo "Error al insertar el registro: " . $conn->error;
        }
    } else {
        echo "Ingrese todos los campos";
    }
}
$conn->close();
?>
