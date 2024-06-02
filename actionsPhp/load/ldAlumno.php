<?php 
    $server = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "colegioweb";

    $conn = new mysqli($server, $user, $pass, $dbname);

    if ($conn->connect_error) {
        die("Error al conectar: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Alumnos";
    $result = $conn->query($sql);

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    $conn->close();

    echo json_encode($data);
?>
