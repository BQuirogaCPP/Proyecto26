<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$bd = "mitienda";

$conn = new mysqli($servidor,$usuario,$contrasena,$bd);

if($conn->connect_error){
    die("Error de conexión");
}
// Obtener el ID de la venta
$id = $_GET["id"];
// Buscar los datos de la venta
$sql = "SELECT * FROM ventas WHERE id='$id'";
$resultado = $conn->query($sql);
$fila = $resultado->fetch_assoc();
?>
<!DOCTYPE html>

<html>
<head>
    <title>Editar Venta</title>
</head>
<body>
    <h2>Editar Venta</h2>
    <form action="actualizarVenta.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $fila["id"]; ?>">
        Pedido:
        <input type="text"value="<?php echo $fila["Pedido_id"]; ?>" readonly>
        <br><br>
        Fecha:
        <input type="date" name="fecha"value="<?php echo $fila["Fecha"]; ?>">
        <br><br>
        Estado
        <select name="estado">
            <option value="Pagado"
                <?php
                    if($fila["Estado"]=="Pagado"){
                        echo "selected";
                    }
                ?>
                >
                Pagado
                </option>
                <option
                value="Pendiente"
                <?php
                    if($fila["Estado"]=="Pendiente"){
                        echo "selected";
                    }
                ?>
                >
                Pendiente
            </option>
        </select>
        <br><br>
        <input type="submit" value="Actualizar Venta">
    </form>
</body>
</html>