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

    // Consulta para obtener los datos de los apoderados
    $sql = "SELECT * FROM Apoderado";
    $result = $conn->query($sql);

    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        // Recorrer los resultados y mostrar los apoderados como opciones de selección
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['ID'] . "'>" . $row['Nombre'] . " " . $row['Apellidos'] . "</option>";
        }
    } else {
        // Si no hay resultados, mostrar un mensaje indicando que no hay apoderados
        echo "<option value=''>No hay apoderados disponibles</option>";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
?>
