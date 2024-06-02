<?php
    // Conexión a la base de datos
    $server = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "colegioweb";

    $conn = new mysqli($server, $user, $pass, $dbname);

    if ($conn->connect_error) {
        die("Error al conectar: " . $conn->connect_error);
    }

    // Consulta para obtener los datos de los cursos
    $sql = "SELECT * FROM Curso";
    $result = $conn->query($sql);

    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        // Recorrer los resultados y mostrar los cursos como opciones de selección
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['ID'] . "'>" . $row['Nivel'] . " " . $row['Letra'] . "</option>";
        }
    } else {
        // Si no hay resultados, mostrar un mensaje indicando que no hay cursos
        echo "<option value=''>No hay cursos disponibles</option>";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
?>
