<?php
    require("../conexion/conexion.php");

    if(isset($_POST['bt'])){

		$apellido=                      $_POST['apellido'];
        $nombre=                        $_POST['nomb'];

		?>
	
		<?php 
		$sql="INSERT INTO servicios ( nombre_servicio,precio_servicio) values ( :no, :em)";
		$resultado=$base_de_datos->prepare($sql);//$base es el nombre de la conexión
		$resultado->execute(array(":no"=>$nombre,":em"=>$apellido));
        echo"<script>alert('Se registro correctamente')</script>";
        echo"<script>window.location='./tablaS.php'</script>";
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/res_clientes.css">
    <title>Registrar</title>
</head>
<body>
    <div id="res">
        <div id="h2"><h2 id="h2_1">Registro </h2></div>
        <form method="post">

        <div id="lab2"><label>Nombre servicio:</label></div>
        <input id="inp2" name="nomb" type="text" placeholder="Ingrese nombre">

        <div id="lab3"><label>Precio servicio:</label></div>
        <input id="inp3" name="apellido" type="number" placeholder="Ingrese precio">

        <input id="bot" type="submit" name="bt" value="Registrar">
    </form>
    </div>
</body>
</html>