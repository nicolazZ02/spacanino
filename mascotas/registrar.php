<?php
    require("../conexion/conexion.php");

    if(isset($_POST['bt'])){
		$apellido=                      $_POST['apellido'];
        $nombre=                        $_POST['nomb'];
		$telefono=                      $_POST['tel'];
        $direccion=                     $_POST['dir'];

		?>
		<input type="number" name="idd" value="<?php echo $idu?>">
		<?php 
		$sql="INSERT INTO mascota ( id_raza,id_cliente,nombre_mascota,color) values ( :no, :em, :usu, :cl)";
		$resultado=$base_de_datos->prepare($sql);//$base es el nombre de la conexión
		$resultado->execute(array(":no"=>$nombre,":em"=>$apellido,":usu"=>$telefono,":cl"=>$direccion));
        echo"<script>alert('Se registro correctamente')</script>";
        echo"<script>window.location='tablaM.php'</script>";
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

        <div id="lab2"><label>Raza:</label></div>
        <select name="nomb">
                    <?php
                    $sql= "SELECT * FROM raza"; 
                    $resultado=$base_de_datos->prepare($sql);
                    $resultado->execute(array());
                    while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    ?>
                    <option value="<?php echo $registro['id_raza'];?>"><?php echo $registro['nombre_raza']?></option>
                        <?php
                        }
                    ?>
                    </select>

        <div id="lab3"><label>Dueño:</label></div>
        <select name="apellido">
                    <?php
                    $sql= "SELECT * FROM clientes"; 
                    $resultado=$base_de_datos->prepare($sql);
                    $resultado->execute(array());
                    while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    ?>
                    <option value="<?php echo $registro['id_cliente'];?>"><?php echo $registro['nombre_cliente']?></option>
                        <?php
                        }
                    ?>
                    </select>

        <div id="lab4"><label>Nombre:</label></div>
        <input id="inp4" name="tel" type="text" placeholder="Ingrese nombre">

        <div id="lab5"><label>color:</label></div>
        <input id="inp5" name="dir" type="text" placeholder="Ingrese color">

        <input id="bot" type="submit" name="bt" value="Registrar">
    </form>
    </div>
</body>
</html>