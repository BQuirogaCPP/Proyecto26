<?php
    session_start();
    $servidor = "localhost";
    $usuario = "root";
    $contrasena = "";
    $bd = "mitienda";
    $conn = new mysqli($servidor,$usuario,$contrasena,$bd);

    if($conn->connect_error){
        die("Error de conexión");
    }
    $ci = $_SESSION["ci"];
    // Consulta para Administrador
    if($_SESSION["rol"] == "Administrador")
    {
        $sql = "SELECT * FROM ventas";
    }
    // Consulta para Vendedor
    if($_SESSION["rol"] == "Administrador")
    {
        $sql = "SELECT * FROM ventas WHERE usuario.CI='$ci'";
    }
    $resultado = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

<title>Ventas</title>

</head>

<body>

<h2>Lista de Ventas</h2>

<table border="1">

<tr>

<th>ID Venta</th>

<th>Pedido</th>

<th>Vendedor</th>

<th>Fecha</th>

<th>Total</th>

<th>Estado</th>

<?php

// Solo el administrador puede editar o eliminar

if($rol=="Administrador")
{

?>

<th>Editar</th>

<th>Eliminar</th>

<?php

}

?>

</tr>

<?php

while($fila=$resultado->fetch_assoc())
{

?>

<tr>

<td><?php echo $fila["id"]; ?></td>

<td><?php echo $fila["Pedido"]; ?></td>

<td><?php echo $fila["Nombre"]; ?></td>

<td><?php echo $fila["Fecha"]; ?></td>

<td><?php echo $fila["Total"]; ?></td>

<td><?php echo $fila["Estado"]; ?></td>

<?php

if($rol=="Administrador")
{

?>

<td>

<a href="editarVenta.php?id=<?php echo $fila["id"]; ?>">

Editar

</a>

</td>

<td>

<a href="eliminarVenta.php?id=<?php echo $fila["id"]; ?>">

Eliminar

</a>

</td>

<?php

}

?>

</tr>

<?php

}

?>

</table>

</body>

</html>