<?php

header("Content-Type: application/json");

include("conexion.php");

// Leer el JSON enviado por AJAX
$datos = json_decode(file_get_contents("php://input"), true);

// Verificar que llegaron datos
if (!$datos) {
    echo json_encode([
        "ok" => false,
        "mensaje" => "No se recibieron datos."
    ]);
    exit;
}

$cliente = $conn->real_escape_string($datos["nombre"]);
$telefono = $conn->real_escape_string($datos["telefono"]);
$direccion = $conn->real_escape_string($datos["direccion"]);
$metodo = $conn->real_escape_string($datos["metodo"]);
$carrito = $datos["carrito"];

// Calcular total
$total = 0;

foreach ($carrito as $producto) {

    $subtotal = $producto["precio"] * $producto["cantidad"];

    $total += $subtotal;

}

// Guardar la venta
$sql = "INSERT INTO venta
(
    cliente,
    telefono,
    direccion,
    total,
    metodo_pago
)
VALUES
(
    '$cliente',
    '$telefono',
    '$direccion',
    '$total',
    '$metodo'
)";

if (!$conn->query($sql)) {

    echo json_encode([
        "ok" => false,
        "mensaje" => $conn->error
    ]);

    exit;
}

// Obtener el ID de la venta
$venta_id = $conn->insert_id;

// Guardar el detalle
foreach ($carrito as $producto) {

    $codigo = $producto["codigo"];
    $cantidad = $producto["cantidad"];
    $precio = $producto["precio"];
    $subtotal = $precio * $cantidad;

    $sqlDetalle = "INSERT INTO detalle_venta
    (
        venta_id,
        producto_codigo,
        cantidad,
        precio,
        subtotal
    )
    VALUES
    (
        '$venta_id',
        '$codigo',
        '$cantidad',
        '$precio',
        '$subtotal'
    )";

    $conn->query($sqlDetalle);

}

echo json_encode([
    "ok" => true,
    "venta_id" => $venta_id
]);

?>