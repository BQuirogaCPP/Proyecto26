<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$bd = "mitienda";

$conn = new mysqli($servidor, $usuario, $contrasena, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
session_start();
//obtiene el id del pedido de la URL
$id_pedido=$_GET['idPedido'];
//Obtener todos los productos
$sql = "SELECT * FROM producto";

$resultado = $conn->query($sql);
//Para hallar todos los productos del pedido

//$res = $resultadoTotal->fetch_assoc();
//Tabla que muestra todos los productos
echo "<h3>Total: "."</h3>";
echo "<table border='1'>";

echo "<tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Cantidad Pedida</th>
      </tr>";
while($fila = $resultado->fetch_assoc()){
    $sqlCarrito="SELECT * FROM carrito where Pedido_id='$id_pedido'";
    $resultadoCarrito=$conn->query($sqlCarrito);
    while($filaCarrito=$resultadoCarrito->fetch_assoc()){
        $idProducto=$filaCarrito["Producto_codigo"];
        if ($idProducto==$fila["codigo"]){
            //Cada fila del producto = pedido del carrito
            echo "<tr>";
            //Datos del producto
            echo "<td>".$fila["codigo"]."</td>";
            echo "<td>".$fila["nombre"]."</td>";
            echo "<td>".$fila["descripcion"]."</td>";
            echo "<td>".$fila["precio"]."</td>";
            echo "<td></td>";
            echo "<td style='background-color: #4f5f7c;'>".$filaCarrito["cantidad"]."</td>";
?>
            <td><a href="aceptarVenta.php?id=<?php echo $id_pedido; ?>">Aceptar </a></td>
            <td><a href="rechazarVenta.php?id=<?php echo $id_pedido; ?>">Rechazar</a></td>
<?php
            echo "</tr>";
        }
    }
}


echo "</table>";


?>
