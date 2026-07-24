<?php
    session_start();
    $servidor="localhost";
    $usuario="root";
    $contrasena="";
    $bd="mitienda";
    $conn=new mysqli($servidor,$usuario,$contrasena,$bd);
    if($conn->connect_error){
        die("Error");
    }
    $rol=$_SESSION["rol"];
    $nombre=$_SESSION["nombre"];
    if($rol=="Administrador")
    {
        $sql="SELECT * FROM ventas";
    }
// Vendedor
    else
    {
        $sql="SELECT * FROM ventas WHERE pedido.NombreVendedor='$usuario'";
    }

    $resultado=$conn->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Historial de Ventas</title>
    </head>
    <body>  
        <h2>Historial de Ventas</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Pedido</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Estado</th>
            </tr>
<?php

        while($fila=$resultado->fetch_assoc())
        {
?>
            <tr>
                <td><?php echo $fila["id"]; ?></td>
                <td><?php echo $fila["Pedido_id"]; ?></td>
                <td><?php echo $fila["Fecha"]; ?></td>
                <td><?php echo $fila["Total"]; ?></td>
                <td><?php echo $fila["Estado"]; ?></td>
            </tr>
<?php
        }
?>
        </table>
    </body>
</html>