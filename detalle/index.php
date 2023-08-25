<?php
include_once '../conexion/conexion.php';
session_start();
if (isset($_GET['documento'])) {
    $id = $_GET['documento'];
    $valit = $base_de_datos->prepare('SELECT * from clientes where id_cliente=?');
    $dat = $valit->execute(array($id));
    $delete = $base_de_datos->query('TRUNCATE TABLE temporal');

    if ($valor = $valit->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION['id'] = $id;

        header("Location:detalle.php?id_cliente=$id");
    } else {
        $n = 'Usuario no registrado';
        echo $n;
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/detalle.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="container">
    <form action="" method="get">
    <div class="form-box">
        <label for="documento" class="form-label">Ingrese su documento</label>
        <input type="number" class="form-input"name="documento">
</div>
        <button type="submit">Validar</button>
    </form>
</div>
    <script>

    </script>
</body>

</html>