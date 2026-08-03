<?php

session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Pedido</title>

<link rel="stylesheet" href="css/estilos.css">

</head>

<body>


<h2 id="tituloPedido">
Pedido
</h2>



<!-- FORMULARIO -->

<div class="formularioPedido">


<label>
Nombre:
</label>

<input type="text" id="nombre">


<br><br>


<label>
Teléfono:
</label>

<input type="text" id="telefono">


<br><br>


<label>
Dirección:
</label>

<input type="text" id="direccion">


<br><br>


<label>
Método de pago:
</label>


<select id="metodoPago">

<option value="QR">
QR
</option>

<option value="Efectivo">
Efectivo
</option>


</select>


<br><br>


<button id="confirmarPedido">

Confirmar Pedido

</button>


</div>



<!-- RESUMEN -->

<div id="resumenPedido" style="display:none">


<h2>
Pedido Pendiente
</h2>


<div id="datosPedido">

</div>


</div>




<script src="js/pedido.js"></script>


</body>

</html>