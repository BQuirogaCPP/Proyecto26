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
    $sql="SELECT Fecha,count(*) FROM ventas GROUP BY fecha";
    $resultado = $conn->query($sql);

    while($fila= $resultado->fetch_assoc()){
        $fechas[] = $fila["Fecha"];
        $ventas[] = $fila["count(*)"];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <script>
        const fechas = <?php echo json_encode($fechas); ?>;
        const ventas = <?php echo json_encode($ventas); ?>;
    </script>   
    <div style="width: 400px; height: 250px;">
        <canvas id="graficoVentas" ></canvas>
    </div>
    <script>
        const ctx = document.getElementById('graficoVentas');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: fechas,
                datasets: [{
                    label: 'Totales de ventas',
                    data: ventas
                }]
            }
        });
    </script>
</body>

</html>