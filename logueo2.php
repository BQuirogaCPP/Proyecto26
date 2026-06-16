<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $bdname = "mitienda";
    $conexion = new mysqli($servername, $username,$password,$bdname);

    if($conexion -> connect_error){
        echo "Hubo un error";
    }
    $user=$_POST['user'];
    $contra=$_POST['pass'];
    $sql="SELECT * FROM usuario WHERE Ci='$user' AND Contrasena='$contra'";

    $resultado=$conexion->query($sql);

    if($resultado->num_rows>0){
        session_start();
        $fila=$resultado->fetch_assoc();
        $_SESSION['Ci']=$user;
        $_SESSION['Nombre']=$fila['Nombre'];
        header("location: productos.php");
    }else{
        echo "credenciales invalidas";
    }

?>