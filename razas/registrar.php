<?php
    require("../conexion/conexion.php");

    if(isset($_POST['bt'])){
		
        $nombre=                        $_POST['nomb'];
		?>
		<input type="number" name="idd" value="<?php echo $idu?>">
		<?php 
		$sql="INSERT INTO raza (nombre_raza) values ( :no)";
		$resultado=$base_de_datos->prepare($sql);//$base es el nombre de la conexión
		$resultado->execute(array(":no"=>$nombre));
        echo"<script>alert('Se registro correctamente')</script>";
        echo"<script>window.location='index.php'</script>";
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

        <div id="lab2"><label>Nombre:</label></div>
        <input id="inp2" name="nomb" type="text" placeholder="Ingrese nombre">

        <input id="bot" type="submit" name="bt" value="Registrar">
    </form>
    </div>
</body>
</html>