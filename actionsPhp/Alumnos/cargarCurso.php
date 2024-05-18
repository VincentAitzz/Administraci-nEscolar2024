<?php
$server="localhost";
$user="root";
$pass="";
$db="colegioweb";

$conn= new mysqli($server,$usre,$pass,$db);
if($conn->connect_error){
    die("Connection failed". $conn->connect_error);
}

$sql="Select ID,Nivel,Letra From Curso";
$result= $conn->query($sql);

if($result->num_rows > 0){
    while($row= $result->fetch_assoc()){
        echo "<option value= '". $row=["ID"] . "'>". $row["Nivel"] . "-". $row["Letra"] . "</option>";
    }
}else{
    echo "<option value=''>No hay cursos disponibles</option>";
}    
$conn->close();
?>