<?php

session_start();

require("conexion.php");

header("Content-Type: application/json");


if(!isset($_SESSION["pedido"])){

echo json_encode([
"ok"=>false
]);

exit;

}



$id=$_SESSION["pedido"];



$sql="
SELECT *
FROM pedido
WHERE id='$id'
";



$resultado=$conn->query($sql);


$pedido=$resultado->fetch_assoc();



/*echo json_encode([

"ok"=>true,
"pedido"=>$pedido

]);*/
echo json_encode([

"ok"=>true,
"pedido"=>$pedido,
"sesion"=>$_SESSION["pedido"]

]);


?>