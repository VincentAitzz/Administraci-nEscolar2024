<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "colegioweb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID = $_POST['id'];
    $numeroAlumnos = $_POST["NumeroAlumnos"];
    $nivel = $_POST["nivel"];
    $letra = $_POST["Letra"];

    if(!empty($ID) && !empty($numeroAlumnos) && !empty($nivel) && !empty($letra)) {
        $stmt = $conn->prepare("UPDATE Curso SET Nivel=?, Letra=?, NumeroAlumnos=? WHERE ID=?");
        $stmt->bind_param("issi", $nivel, $letra, $numeroAlumnos, $ID);

        if ($stmt->execute()) {
            echo "Registro actualizado con éxito";
        } else {
            echo "Error al actualizar el registro: " . $stmt->error;
        }
    } else {
        echo "Ingrese Datos";
    }
}

$conn->close();
?>
