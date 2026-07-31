<?php

    $servidor="localhost";
    $usuario="root";
    $contrasena="";
    $bd="mitienda";

    $conn=new mysqli($servidor,$usuario,$contrasena,$bd);

    if($conn->connect_error){
        die("Error de conexión");
    }
    $id=$_GET["id"];
    $sql="UPDATE pedido SET Estado='Rechazado' WHERE id='$id'";
    if($conn->query($sql))
    {
        echo "<h2>Pedido rechazado correctamente.</h2>";
        echo "<a href='listarPedidos.php'>Volver</a>";
    }
    else
    {
        echo "Error: ".$conn->error;
    }

?>