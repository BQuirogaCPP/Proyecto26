<?php
    $servidor="localhost";
    $usuario="root";
    $contrasena="";
    $bd="mitienda";
    $conn=new mysqli($servidor,$usuario,$contrasena,$bd);
    $id_pedido=$_GET['id_pedido'];
    $sql="SELECT * FROM pedido WHERE id='$id_pedido'";
    $resultado=$conn->query($sql);
    while($fila=$resultado->fetch_assoc())
    {
        $nombre=$fila["Nombre"];
    }
    //Para hallar el total del pedido
    $sqlTotal="SELECT sum(costototal) FROM carrito where Pedido_id='$id_pedido'";
    $resultadoTotal=$conn->query($sqlTotal);
    $res = $resultadoTotal->fetch_assoc();
    $total=$res['sum(costototal)'];
    if($res['sum(costototal)']==null){
        $total=0;
    }
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Registrar Venta</title>
        </head>
    <body>
        <h2>Registrar Venta</h2>
        <form action="registroVenta.php" method="POST">
            Pedido de:
            <input type="text" name="nombrePedido" value="<?php echo $nombre?>" readonly>
            <br><br>
            Fecha:
            <input type="date" name="fecha">
            <br><br>
            Estado:
            <select name="estado">
                <option value="Pagado">Pagado</option>
                <option value="Pendiente">Pendiente</option> 
            </select>
            <br><br>
            <input type="hidden" value="<?=$total?>" name="total">
            <input type="hidden" value="<?=$id_pedido?>" name="pedido_id">
            <input type="submit" value="Registrar Venta">
        </form>
    </body>

</html>