<?php
    $servidor="localhost";
    $usuario="root";
    $contrasena="";
    $bd="mitienda";
    $conn=new mysqli($servidor,$usuario,$contrasena,$bd);
    if($conn->connect_error)
    {
        die("Error de conexión");
    }

    $pedido=$_POST["pedido_id"];
    $fecha=$_POST["fecha"];
    $estado=$_POST["estado"];
    $total=$_POST["total"];
    $sql="INSERT INTO Ventas (Pedido_id,Fecha,Total,Estado) VALUES ('$pedido','$fecha','$total','$estado')";
    if($conn->query($sql))
    {

        // Buscar nuevamente los productos para descontar stock
        $sql="SELECT * FROM carrito WHERE Pedido_id='$pedido'";
        $resultado=$conn->query($sql);
        while($fila=$resultado->fetch_assoc())
        {
            $codigo=$fila["Producto_codigo"];
            $cantidad=$fila["cantidad"];
            // Obtener stock actual
            $sql2="SELECT stock FROM producto WHERE codigo='$codigo'";
            $r2=$conn->query($sql2);
            $producto=$r2->fetch_assoc();
            $stock=$producto["stock"];
            $nuevoStock=$stock-$cantidad;
            // Actualizar stock
            $sql3="UPDATE producto SET stock='$nuevoStock' WHERE codigo='$codigo'";
            $conn->query($sql3);
        }
        echo "<h2>Venta registrada correctamente</h2>";
        header("Location: ventas.php");

    }
    else
    {

        echo "Error ".$conn->error;

    }

?>