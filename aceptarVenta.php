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
    $sql="UPDATE pedido SET Estado='Aceptado' WHERE id='$id'";
    if($conn->query($sql))
    {
        header("Location: formVenta.php?id_pedido=".$id);
        exit();
    }
    else
    {
        echo "Error: ".$conn->error;
    }

?>