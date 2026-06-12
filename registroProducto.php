<?php

$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$bd = "mitienda";

$conn = new mysqli($servidor, $usuario, $contrasena, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$codigo = $_POST["codigo"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];

$sql = "INSERT INTO producto
(codigo,nombre,descripcion,precio)
VALUES
('$codigo','$nombre','$descripcion','$precio')";

if($conn->query($sql)){
    echo "Producto registrado correctamente";
}else{
    echo "Error: ".$conn->error;
}



?>