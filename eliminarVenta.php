<?php

    $servidor="localhost";
    $usuario="root";
    $contrasena="";
    $bd="mitienda";

    $conn=new mysqli($servidor,$usuario,$contrasena,$bd);
zx
    if($conn->connect_error){
        die("Error de conexión");
    }
    $id=$_GET["id"];
    $sql="SELECT * FROM ventas WHERE id='$id'";
    $resultado=$conn->query($sql);
    $venta=$resultado->fetch_assoc();
    $pedido=$venta["Pedido_id"];
    // Buscar todos los productos del pedido
    $sql="SELECT * FROM carrito WHERE Pedido_id='$pedido'";
    $resultado=$conn->query($sql);
    while($fila=$resultado->fetch_assoc())
    {
        $codigo=$fila["Producto_codigo"];
        $cantidad=$fila["Cantidad"];
        // Obtener stock actual
        $sql2="SELECT stock FROM producto WHERE codigo='$codigo'";
        $r2=$conn->query($sql2);
        $producto=$r2->fetch_assoc();
        $stock=$producto["stock"];
        $nuevoStock=$stock+$cantidad;
        // Devolver stock
        $sql3="UPDATE producto SET stock='$nuevoStock' WHERE codigo='$codigo'";
        $conn->query($sql3);
    }
    // Eliminar la venta
    $sql="DELETE FROM venta WHERE id='$id'";
    if($conn->query($sql))
    {
        echo "<h2>Venta eliminada correctamente</h2>";
    }
    else
    {
        echo "Error ".$conn->error;
    }

?>