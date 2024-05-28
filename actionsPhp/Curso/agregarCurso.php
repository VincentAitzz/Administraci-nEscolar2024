<?php
// Verificar el método de solicitud
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar valores
    $numeroAlumnos = $_POST["NumeroAlumnos"];
    $nivel = $_POST["nivel"];
    $letra = $_POST["Letra"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "colegioweb";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        echo "Error en la conexión";
    }

    if (!empty($numeroAlumnos) && !empty($nivel) && !empty($letra)) {
        $Agregar = "INSERT INTO Curso(Nivel, Letra, NumeroAlumnos) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($Agregar);
        $stmt->bind_param("isi", $nivel, $letra, $numeroAlumnos); // "ssi" indica string, string, integer

        $stmt->execute();

        // Verificar si se agregó correctamente
        if ($stmt->affected_rows > 0) {
            echo "Curso agregado correctamente.";
        } else {
            echo "Error al agregar curso";
        }

        // Cerrar la consulta preparada
        $stmt->close();
    } else {
        echo "Por favor, complete todos los campos.";
    }

    // Cerrar la conexión
    $conn->close();
}
?>
