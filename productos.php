<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$bd = "mitienda";

$conn = new mysqli($servidor, $usuario, $contrasena, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM producto";

$resultado = $conn->query($sql);

echo "<table border='1'>";

echo "<tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
      </tr>";

while($fila = $resultado->fetch_assoc()){

    echo "<tr>";

    echo "<td>".$fila["codigo"]."</td>";
    echo "<td>".$fila["nombre"]."</td>";
    echo "<td>".$fila["descripcion"]."</td>";
    echo "<td>".$fila["precio"]."</td>";

    echo "</tr>";
}

echo "</table>";

?>
