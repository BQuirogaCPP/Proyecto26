<?php
    $servidor="localhost";
    $usuario="root";
    $contrasena="";
    $bd="mitienda";
    $conn=new mysqli($servidor,$usuario,$contrasena,$bd);
    if($conn->connect_error){
        die("Error de conexión");
    }
    // Recibir datos
    $id=$_POST["id"];
    $fecha=$_POST["fecha"];
    $estado=$_POST["estado"];
    // Actualizar solamente fecha y estado
    $sql="UPDATE ventas SET Fecha='$fecha', Estado='$estado' WHERE id='$id'";
    if($conn->query($sql))
    {
        echo "<h2>Venta actualizada correctamente</h2>";
    }
    else
    {
        echo "Error ".$conn->error;
    }
?>