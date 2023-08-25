<?php
include_once '../conexion/conexion.php';
$orden = $base_de_datos->query('SELECT * FROM orden_servicio');
$datos = $orden->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/orden.css" rel="stylesheet" type="text/css">
</head>

<body>
    <h3 href="../detalle/index.php">Crear orden</h3>
    <table>
        <thead>
            <tr>
                <th>Numero de orden</th>
                <th>Cliente</th>
                <th>Auxiliar</th>
                <th>Recepcionista</th>
                <th>Total</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="contenido">




        </tbody>
    </table>

    <script src="../json/orden.js"></script>
</body>

</html>

