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

    switch ($datos['tabla']) {
        case 'Curso':
            $ID = $datos['id'];

            $stmt = $conexion->prepare("DELETE FROM CURSO WHERE ID = ?");
            $stmt->bind_param("i",$ID);

            if($stmt->execute()){
                echo "Registro Eliminado Correctamente";
            }else{
                echo "Error al Eliminar el registro". $conexion->error;
            }
            break;
        case 'Alumno':
            $ID = $datos['id'];

            $stmt = $conexion->prepare("DELETE FROM Alumnos WHERE ID = ?");
            $stmt->bind_param("i",$ID);

            if($stmt->execute()){
                echo "Registro Eliminado Correctamente";
            }else{
                echo "Error al Eliminar el registro". $conexion->error;
            }
            break;
        case 'Apoderado':
            $ID = $datos['id'];

            $stmt = $conexion->prepare("DELETE FROM Apoderado WHERE ID = ?");
            $stmt->bind_param("i",$ID);

            if($stmt->execute()){
                echo "Registro Eliminado Correctamente";
            }else{
                echo "Error al Eliminar el registro". $conexion->error;
            }
            break;
        case 'Asignatura':
            $ID = $datos['id'];

            $stmt = $conexion->prepare("Delete from Asignatura where ID = ?");
            $stmt->bind_param("i",$ID);

            if($stmt->execute()){
                echo "Registro Eliminado Correctamente";
            }else{
                echo "Error al Eliminar el registro". $conexion->error;
            }
            break;
        case 'Clase':
            $ID = $datos['id'];

            $stmt = $conexion->prepare("DELETE FROM Clase WHERE ID = ?");
            $stmt->bind_param("i",$ID);

            if($stmt->execute()){
                echo "Registro Eliminado Correctamente";
            }else{
                echo "Error al Eliminar el registro". $conexion->error;
            }
            break;
        case 'Empleado':
            $ID = $datos['id'];

            $stmt = $conexion->prepare("DELETE FROM Empleados WHERE ID = ?");
            $stmt->bind_param("i",$ID);

            if($stmt->execute()){
                echo "Registro Eliminado Correctamente";
            }else{
                echo "Error al Eliminar el registro". $conexion->error;
            }
            break;
        case 'Nivel':
            $ID = $datos['id'];

            $stmt = $conexion->prepare("DELETE FROM Nivel WHERE ID = ?");
            $stmt->bind_param("i",$ID);

            if($stmt->execute()){
                echo "Registro Eliminado Correctamente";
            }else{
                echo "Error al Eliminar el registro". $conexion->error;
            }
        default:
            # code...
            break;
    }
}