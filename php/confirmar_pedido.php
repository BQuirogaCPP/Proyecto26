<?php

/*ini_set('display_errors',1);
error_reporting(E_ALL);*/

session_start();

require("conexion.php");

header("Content-Type: application/json");



$datos=json_decode(
file_get_contents("php://input"),
true
);



if(!$datos){

echo json_encode([

"ok"=>false,
"mensaje"=>"No llegaron datos"

]);

exit;

}



if(!isset($_SESSION["pedido"])){

echo json_encode([

"ok"=>false,
"mensaje"=>"No existe pedido activo"

]);

exit;

}



$idPedido=$_SESSION["pedido"];



$nombre=$datos["nombre"];
$telefono=$datos["telefono"];
$direccion=$datos["direccion"];
$metodo=$datos["metodo"];




$stmt=$conn->prepare("

UPDATE pedido SET

Nombre=?,
telefono=?,
direccion=?,
metodoPago=?,
Estado='Pendiente'

WHERE id=?

");



$stmt->bind_param(

"ssssi",

$nombre,
$telefono,
$direccion,
$metodo,
$idPedido

);



if($stmt->execute()){


echo json_encode([

"ok"=>true,
"mensaje"=>"Pedido confirmado",
"pedido"=>$idPedido

]);


}else{


echo json_encode([

"ok"=>false,
"mensaje"=>$stmt->error

]);


}


$stmt->close();
$conn->close();

?>