<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$bd = "mitienda";

$conn = new mysqli($servidor, $usuario, $contrasena, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
$ci = $_POST["ci"];
$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];
$contrasena = $_POST["contrasena"];

$sql = "INSERT INTO usuario
(CI,Nombre,Direccion,Contrasena)
VALUES
('$ci','$nombre','$direccion','$contrasena')";

if($conn->query($sql)){
    echo "Usuario registrado correctamente";
}else{
    echo "Error: ".$conn->error;
}

?>