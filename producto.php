<?php

$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$bd = "mitienda";

$conn = new mysqli($servidor, $usuario, $contrasena, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$codigo = $_GET["codigo"];

$sql = "SELECT * FROM producto
        WHERE codigo = '$codigo'";

$resultado = $conn->query($sql);

if($resultado->num_rows > 0){

    $fila = $resultado->fetch_assoc();

    echo "Código: ".$fila["codigo"]."<br>";
    echo "Nombre: ".$fila["nombre"]."<br>";
    echo "Descripción: ".$fila["descripcion"]."<br>";
    echo "Precio: ".$fila["precio"]."<br>";

}else{

    echo "Producto no encontrado";

}