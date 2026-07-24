<?php
    $servidor = "localhost";
    $usuario = "root";
    $contrasena = "";
    $bd = "mitienda";
    $conn = new mysqli($servidor, $usuario, $contrasena, $bd);
    if($conn->connect_error){
        die("Error de conexión");
    }
    $sql = "SELECT * FROM ventas ";
    $resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lista de Ventas</title>
    </head>
    <body>
        <h2>Lista de Ventas</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Pedido</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Editar</th>
                <th>Eliminar</th>
        </tr>
<?php
            while($fila = $resultado->fetch_assoc())
            {
?>
                <tr>
                    <td><?php echo $fila["id"]; ?></td>
                    <td><?php echo $fila["Pedido_id"]; ?></td>
                    <td><?php echo $fila["Fecha"]; ?></td>
                    <td><?php echo $fila["Total"]; ?></td>
                    <td><?php echo $fila["Estado"]; ?></td>
                    <td> <a href="editarVenta.php?id=<?php echo $fila["id"]; ?>"> Editar </a></td>
                    <td> <a href="eliminarVenta.php?id=<?php echo $fila["id"]; ?>"> Eliminar </a></td>
                </tr>
<?php
            }
?>
        </table>
    </body>

</html>