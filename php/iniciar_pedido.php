<?php

session_start();

require("conexion.php");

// ¿Ya existe un pedido?
if(isset($_SESSION["pedido"])){

    echo json_encode([
        "ok"=>true,
        "pedido"=>$_SESSION["pedido"]
    ]);

    exit;

}

// Crear un nuevo pedido

$fecha = date("Y-m-d");

$sql = "INSERT INTO Pedido
        (Nombre,Fecha,Estado,NombreVendedor)
        VALUES
        ('','$fecha','Abierto','Pendiente')";

$conn->query($sql);

$idPedido = $conn->insert_id;

$_SESSION["pedido"] = $idPedido;

echo json_encode([
    "ok"=>true,
    "pedido"=>$idPedido
]);