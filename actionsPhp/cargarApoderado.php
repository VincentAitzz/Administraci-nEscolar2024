<?php
$server="localhost";
$usre="root";
$pass="";
$db="colegioweb";

$conn= new mysqli($server,$usre,$pass,$db);
if($conn->connect_error){
    die("Connection failed". $conn->connect_error);
}

$sql="Select ID,Nombre From Apoderado";
$result= $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<option value='" . $row["ID"] . "'>" . $row["Nombre"] . "</option>";

    }
}else{
    echo "<option value=''>No hay apoderados disponibles</option>";
}
$conexion->close();
?>