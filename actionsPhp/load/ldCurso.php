<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "colegioweb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error al conectar: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Curso";
    $result = $conn->query($sql);

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    $conn->close();

    echo json_encode($data);
?>
