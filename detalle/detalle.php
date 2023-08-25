
<?php
session_start();
include_once '../conexion/conexion.php';
if (isset($_GET['id_cliente'])) {
    $id = $_GET['id_cliente'];
    $orden = $base_de_datos->query('SELECT * FROM temporal INNER JOIN servicios ON temporal.id_servicio=servicios.id_servicio INNER JOIN clientes ON temporal.id_cliente=clientes.id_cliente INNER JOIN auxiliar ON temporal.id_auxiliar=auxiliar.id_auxiliar');
    $datos = $orden->fetchAll(PDO::FETCH_ASSOC);

    $servicio = $base_de_datos->query('SELECT * FROM servicios');
    $data = $servicio->fetchAll(PDO::FETCH_ASSOC);


    $auxi = $base_de_datos->query('SELECT * FROM auxiliar');
    $au = $auxi->fetchAll(PDO::FETCH_ASSOC);

    ////INSERT TEMPORAL//////
    // echo $_SESSION['id'];
    if (isset($_POST['envia'])) {
        $servicio = $_POST['servicio'];
        $auxiliar = $_POST['auxiliar'];
        $cliente = $_SESSION['id'];
        $total = $_POST['price'];
        $recepcionista = $_SESSION['cedu'];
        $numero = $_POST['numero'];
        $fecha = $_POST['fecha'];
        $insert = $base_de_datos->prepare('INSERT INTO temporal (numero_orden,id_servicio,id_cliente,id_auxiliar,total) VALUES (?,?,?,?,?)');
        $file = $insert->execute(array($numero, $servicio, $cliente, $auxiliar, $total));

        /////insert detalle////

        $insert2 = $base_de_datos->prepare('INSERT INTO detalle (numero_orden,id_servicio,id_cliente,id_auxiliar,total) VALUES (?,?,?,?,?)');
        $file = $insert2->execute(array($numero, $servicio, $cliente, $auxiliar, $total));

        ////insert orden////

        $insert3 = $base_de_datos->prepare('INSERT INTO orden_servicio (numero_orden,id_cliente,id_auxiliar,id_recepcionista,total,fecha,id_estado) VALUES (?,?,?,?,?,?,?)');
        $file = $insert3->execute(array($numero, $cliente, $auxiliar, $recepcionista, $total, $fecha, 1));



        header("Location:detalle.php?id_cliente=$id");
    }






?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Orden</th>
                    <th>Servicio</th>
                    <th>Cliente</th>
                    <th>Auxiliar</th>
                    <th>Total</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($datos as $key) {
                ?>
                    <tr>
                        <td><?php echo $key['id_detalle'] ?></td>
                        <td><?php echo $key['numero_orden'] ?></td>
                        <td><?php echo $key['nombre_servicio'] ?></td>
                        <td><?php echo $key['nombre_cliente'] ?></td>
                        <td><?php echo $key['nombre_auxiliar'] ?></td>
                        <td><?php echo $key['total'] ?></td>
                        <td><a href="delete.php?numero_orden=<?php echo $key['numero_orden'] ?>&&id_cliente=<?php echo $id ?>">ELiminar</a></td>
                    </tr>


                <?php
                }
                ?>



            </tbody>
        </table>
        <form action="" method="post">
            <label for="servico">Servicio</label>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <select name="servicio" class="form-control col-auto mx-5">
                <?php
                foreach ($data as $valor) {
                ?>

                    <option data-typeid="<?php echo $valor['precio_servicio'] ?>" value="<?php echo $valor['id_servicio'] ?>"><?php echo $valor['nombre_servicio'] ?></option>

                <?php
                } ?>

            </select>
            <input type="number" value="" id="money" name="price" placeholder="Precio" readonly class="form-control col-auto mx-5">
            <script type="text/javascript">
                $(document).on('change', 'select.form-control', function() {
                    var r = $('select.form-control option[value="' + $(this).val() + '"]').attr("data-typeid")
                    $("#money").val(r)
                });
            </script>

            <select name="auxiliar" aria-label=" Default select example">
                <?php
                foreach ($au as $valor) {
                    $id = $valor['id_auxiliar'];
                    $producto = $valor['nombre_auxiliar'];
                ?>
                    <option value="<?php echo $id ?>"><?php echo $producto ?></option>
                <?php }
                ?>

            </select>
            <input type="hidden" name="numero" value="<?php echo rand() ?>">
            <input type="hidden" name="fecha" value="<?php echo date('Y-m-d') ?>">

            <button type="submit" name="envia">Enviar</button>

        </form>
    </body>

    </html>
<?php
} else {
    echo 'F';
}
?>
