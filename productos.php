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
        <th>Imagen</th>
      </tr>";

while($fila = $resultado->fetch_assoc()){

    echo "<tr>";

    echo "<td>".$fila["codigo"]."</td>";
    echo "<td>".$fila["nombre"]."</td>";
    echo "<td>".$fila["descripcion"]."</td>";
    echo "<td>".$fila["precio"]."</td>";
    echo "<td>
            <a href='producto.php?codigo=".$fila["codigo"]."'>
                <button>Mostrar</button>
            </a>

            <a href='editarProducto.php?codigo=".$fila["codigo"]."'>
                <button>Editar</button>
            </a>

            <a href='eliminar.php?codigo=".$fila["codigo"]."'>
                <button>Eliminar</button>
            </a>
          </td>";
    $nombreArchivo="P-".$fila["codigo"];
    $directorio = "media/";
    //lista de todas las extenciones posibles
    $extensiones = ["jpg", "jpeg", "png", "gif"];
    //bandera para verificar todo tipo de archivo
    $archivoEncontrado = null;
    //verificar si el archivo se creo en alguna extension conocida
    foreach ($extensiones as $ext) {
        //nombre del archivo con cada extension
        $ruta = $directorio . $nombreArchivo . "." . $ext;
        //verifica
        if (file_exists($ruta)) {
            $archivoEncontrado = $ruta;
            //detenemos la búsqueda en cuanto lo encuentra
            break;
        }
    }

    //verifica si encontró algun archivo con el nombre
    if ($archivoEncontrado) {
        $extension = strtolower(pathinfo($archivoEncontrado, PATHINFO_EXTENSION));
        // Mostrar según el tipo
        echo "<td><img src='".$archivoEncontrado."' width=250></td>";
    }else{
        echo "<td>No imagen</td>";
    }
    echo "</tr>";
    echo "</tr>";
}

echo "</table>";
echo "<a href='formPedido.php'>
        <button>Generar Nuevo Pedido</button>
      </a><br><br>";

?>
