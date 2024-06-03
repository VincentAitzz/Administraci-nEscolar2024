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
        case 'Empleado':
            // Aquí iría la lógica para actualizar un empleado
            $ID = $datos['id'];
            $RUT = $datos['rut'];
            $Nombre = $datos['nombre'];
            $Apellido = $datos['apellidos'];
            $Cargo = $datos['cargo'];
            $TipoContrato = $datos['tipoContrato'];
            $Estado = $datos['estadoContrato'];
            $Contacto = $datos['contacto'];

            //  Si pondras los procedimientos almacenados cambia solo lo que esta dentro de las comillas en la Linea de abajo
            $stmt = $conexion->prepare("UPDATE Empleados SET RUT = ?, Nombre = ?,Apellidos = ?, Cargo = ?, TipoContrato =?, Estado = ?, Contacto = ? WHERE id = ?");
            $stmt->bind_param("sssssssi", $RUT, $Nombre,$Apellido, $Cargo, $TipoContrato, $Estado, $Contacto, $ID);


            if ($stmt->execute()) {
                echo "Registro actualizado con éxito";
            } else {
                echo "Error al actualizar el registro: " . $conexion->error;
            }
            break;

        case 'Apoderado':
            // Aquí iría la lógica para actualizar un apoderado
                $ID = $datos['id'];
                $RUT = $datos['rut'];
                $Nombre = $datos['nombre'];
                $Apellidos = $datos['apellidos'];
                $Contacto = $datos['contacto'];

                $stmt = $conexion->prepare("UPDATE Apoderado SET RUT= ?, Nombre =?, Apellidos = ?, Contacto = ? WHERE ID = ?");
                $stmt->bind_param("ssssi",$RUT,$Nombre,$Apellidos,$Contacto,$ID);

                if($stmt->execute()){
                    echo "Registro actualizado con éxito";
                }else{
                    echo "Error al actualizar el registro: " . $conexion->error;
                }
                break;
            break;

        case 'Alumno':
            // Aquí iría la lógica para actualizar un alumno
                    $ID = $datos['id'];
                    $RUT = $datos['rut'];
                    $Nombre = $datos['nombre'];
                    $Apellido = $datos['apellidos'];
                    $Edad = $datos['edad'];
                    $PromedioGeneral = $datos['promedio'];
                    $Apoderado = $datos['apoderado'];
                    $Curso = $datos['curso'];
        
                    $stmt = $conexion->prepare("UPDATE alumnos SET RUT = ?, Nombre =?, Apellido =?, Edad =?, PromedioGeneral =?, Apoderado =?, Curso =? Where ID = ?");
                    $stmt->bind_param("ssssiisi", $RUT, $Nombre, $Apellido, $Edad, $PromedioGeneral, $Apoderado, $Curso, $ID);


        
                    if ($stmt->execute()) {
                        echo "Registro actualizado con éxito";
                    } else {
                        echo "Error al actualizar el registro: " . $conexion->error;
                    }
                    break;

        case 'Curso':
            $ID = $datos['id'];
            $nivel = $datos['nivel'];
            $letra = $datos['letra'];
            $NumeroAlumnos = $datos['NumeroAlumnos'];

            $stmt = $conexion->prepare("UPDATE Curso SET Nivel = ?, Letra = ?, NumeroAlumnos = ? WHERE id = ?");
            $stmt->bind_param("sssi", $nivel, $letra, $NumeroAlumnos, $ID);

            if ($stmt->execute()) {
                echo "Registro actualizado con éxito";
            } else {
                echo "Error al actualizar el registro: " . $conexion->error;
            }
            break;

        case 'nivel':
            // Aquí iría la lógica para actualizar un nivel
                    $ID = $datos['id'];
                    $Grado = $datos['Grado'];
                     $Categoria = $datos['Categoria'];
                        
                     $stmt = $conexion->prepare("UPDATE nivel SET Grado = ?, Categoria = ? WHERE ID = ?");
                    $stmt->bind_param("ssi", $Grado, $Categoria,$ID);
                        
                    if ($stmt->execute()) {
                                echo "Registro actualizado con éxito";
                    } else {
                                echo "Error al actualizar el registro: " . $conexion->error;
                    }
            break;
            //ASIGNATRURA, CLASE, 
        case 'Asignatura':
            $ID = $datos['id'];
            $Nombre = $datos['Nombre'];
            $Profesor = $datos['Profesor'];

            $stmt = $conexion->prepare("UPDATE Asignatura SET Nombre = ?, Profesor = ? WHERE ID = ?");
            $stmt->bind_param("sii", $Nombre,$Profesor,$ID);

            if($stmt->execute()){
                echo "Registro actualizado correctamente";
            }else{
                echo "Error al actualizar el Registro: " .$conexion->error;
            }
            break;
        case 'Clase':
            $ID = $datos['id'];
            $Nombre = $datos['Nombre'];
            $Profesor = $datos['Profesor'];
            $Curso = $datos['Curso'];
            $Aula = $datos['Aula'];
            $Fecha = $datos['Fecha'];

            $stmt = $conexion->prepare("UPDATE Clase SET NombreAsig = ?, Profesor =?, Curso =?, Aula =?, Fecha_Hora = ? WHERE ID = ?");
            $stmt->bind_param("siissi",$Nombre,$Profesor,$Curso,$Aula,$Fecha,$ID);

            if($stmt->execute()){
                echo " Registro Actualizado Correctamente";

            }else{
                echo "Error al actualizar el Registro: " .$conexion->error;

            }
            break;
        default:
            echo "Tabla no válida";

    }

    $conexion->close();
}
?>
