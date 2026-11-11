<?php
$servidor = getenv('DB_HOST');
$usuario = getenv('DB_USER');
$contrasena = getenv('DB_PASS');
$bd = getenv('DB_NAME');
$conn = new mysqli($servidor, $usuario, $contrasena, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
$ci = $_POST["ci"];
$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];
$contrasena = $_POST["contrasena"];

$sql = "INSERT INTO Usuario
(CI,Nombre,Direccion,Contrasena)
VALUES
('$ci','$nombre','$direccion','$contrasena')";

if($conn->query($sql)){
    echo "Usuario registrado correctamente";
}else{
    echo "Error: ".$conn->error;
}

?>