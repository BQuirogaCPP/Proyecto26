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
    $sql="SELECT nombre,stock FROM producto ORDER BY stock DESC LIMIT 3";
    $resultado = $conn->query($sql);

    while($fila= $resultado->fetch_assoc()){
        $nombres[] = $fila["nombre"];
        $stock[] = $fila["stock"];
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
        const nombres = <?php echo json_encode($nombres); ?>;
        const stock = <?php echo json_encode($stock); ?>;
    </script>   
    <div style="width: 400px; height: 250px;">
        <canvas id="graficoVentas" ></canvas>
    </div>
    <script>
        const ctx = document.getElementById('graficoVentas');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: nombres,
                datasets: [{
                    label: 'Totales de ventas',
                    data: stock
                }]
            }
        });
    </script>
</body>

</html>