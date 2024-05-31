<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "colegioweb";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexion = new mysqli($servername,$username,$password,$dbname);
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $datos = json_decode(file_get_contents('php://input'), true);

    /*
    
    Revisa los Formularios de las tablas en caso de cualquier shit
    
    */

    
    switch ($datos['tabla']) {
        case "Empleado":
            $RUT = $datos['rut'];
            $Nombre = $datos['nombre'];
            $Apellido = $datos['apellidos'];
            $Cargo = $datos['cargo'];
            $TipoContrato = $datos['tipoContrato'];
            $Estado = $datos['estadoContrato'];
            $Contacto = $datos['contacto'];

            //  Si pondras los procedimientos almacenados cambia solo lo que esta dentro de las comillas en la Linea de abajo
            $stmt = $conexion->prepare("INSERT INTO empleados(RUT,Nombre,Apellidos,Cargo,TipoContrato,Estado,Contacto) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $RUT, $Nombre, $Apellido, $Cargo, $TipoContrato, $Estado, $Contacto);

            if ($stmt->execute()) {
                echo "Registro insertado con éxito";
            } else {
                echo "Error al insertar el registro: " . $conexion->error;
            }
            break;
        //Agrega más case según las tablas
    }
}
$conexion->close();
?>