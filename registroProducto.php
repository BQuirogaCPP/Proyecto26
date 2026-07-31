<?php

$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$bd = "mitienda";

$conn = new mysqli($servidor, $usuario, $contrasena, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$codigo = $_POST["codigo"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];

$sql = "INSERT INTO producto (codigo,nombre,descripcion,precio) VALUES ('$codigo','$nombre','$descripcion','$precio')";
if($conn->query($sql)){

    //Define a que carpeta irá el archivo
    $target_dir = "../media/";
    //recuperar el tipo de archivo (extension)
    $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION));
    //Define el nombre del archivo P-[codigo del producto]
    $newFileName = "P-".$codigo.".".$imageFileType;
    //ruta comppleta de carpeta+nombre donde se guardara el archivo
    $target_file = $target_dir . $newFileName;
    //variable que funcionara como "bandera" si el valor es 1 se puede subir, si es 0 algo pasó
    $uploadOk = 1;
    echo $target_file;

    // Verificar si el archivo existe
    if (file_exists($target_file)) {
        echo "Lo sentimos, ya subiste este archivo.";
        $uploadOk = 0;
    }
    // Validar extensiones permitidas
    if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" &&$imageFileType != "gif")
    {
        echo "Solo se permiten imágenes JPG, JPEG, PNG o GIF.<br>";
        $uploadOk = 0;
    }
    //subir archivo
    if ($uploadOk == 0) {
        echo "Ocurrió algun error.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " se subió.";
        } else {
            echo "No se pudo subir tu archivo.";
        }
    }
    header("Location: productos.php");
    echo "Producto registrado correctamente";
}else{
    echo "Error: ".$conn->error;
}



?>