<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="registroProducto.php" method="POST" enctype="multipart/form-data">
        Código:
        <input type="number" name="codigo"><br>
        Nombre:
        <input type="text" name="nombre"><br>
        Descripción:
        <input type="text" name="descripcion"><br>
        Precio:
        <input type="number" step="0.01" name="precio"><br>
        <input type="file" name="fileToUpload">
        <input type="submit" value="Registrar">
    </form>
</body>
</html>