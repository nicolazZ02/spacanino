<?php
   session_start();
   include_once("../conexion/conexion.php");

   $cedu1=                 $_SESSION['cedu'];
   $nombre1=               $_SESSION['nomb'];
   $tipo=                  $_SESSION['tipo'];
   $tip=                   $_SESSION['tip'];

    $sentencia1="SELECT * FROM servicios";
    $resultado=$base_de_datos->prepare($sentencia1);
    $resultado->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- CSS only -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href=" https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css">
    <title>cliente</title>
    <style>
        a{
            color:white;
        }
        a:hover{
            color:aqua;
        }
        #a{
            color:black;
        }
        table{
            margin-top:20px;
            width:230px;
        }
        h1{
          font-size:25px;
          margin-top:40px;
        }
        h2{
          margin-top:10px;
          font-size:25px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <li class="nav-item">

        <a  href="../admin/index.php">Inicio</a></li>
        
        <li class="nav-item">
        <a href="../recepcionista/index.php">Recepcionistas</a></li>
    
        <li class="nav-item">
        <a href="../admin/user.php">Usuarios</a></li>

        <li class="nav-item">
        <a href="../client/index.php">Clientes</a></li>

        <li class="nav-item">
        <a href="../auxiliar/index.php">Auxiliares</a></li>
    
        <li class="nav-item">
        <a href="../mascotas/tablaM.php">Mascotas</a></li>

        <li class="nav-item">
        <a href="../razas/index.php">Razas</a></li>

        <li class="nav-item">
        <a href="../servicios/tablaS.php">Servicios</a></li>

        <li class="nav-item">
        <a href="../orden/index.php">Orden de servicios</a></li>
        
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li><a href="../cerrar.php">Cerrar sesion</a></li>      
      </ul>
    </div>
  </div>
</nav>
<form method="post" action="buscar.php">
        <div id="nim">
            <a href="registrar.php">
                <button class="btn btn-primary" type="button">
                    Registrar
                </button>
            </a>
        </div>
        <input class="buscar"  type="search" name="busca"  id="" placeholder="Buscar"> 
        <button id="but" class="btn btn-primary">buscar</button>
        <br> <br>
        <div id="tag">
        <table  class="table">
        <tr>
            <th>N. de servicio</th>
            <th>Servicio</th>
            <th>Precio</th>
            <th colspan="3">Accion</th>
        </tr>
        <?php
            foreach ($resultado as $move) {
        ?>
        <tr>
            <td><?php echo $move->id_servicio;?></td>
            <td><?php echo $move->nombre_servicio?></td>
            <td><?php echo $move->precio_servicio?></td>
            <td>
                    <a class="btn btn-primary" href="eliminar.php?id=<?php echo $move->id_servicio?> & nomb=<?php echo $move->nombre_servicio?>">
					    eliminar
                    </a>
                </td>
                <td>
                    <a class="btn btn-primary" href="modificar.php?id=<?php echo $move->id_servicio?> & nomb=<?php echo $move->nombre_servicio?>">
					    editar
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </div>
    </table class="dos">
		<td>
			<a href="../admin/index.php" onmouseup="window.close()">
                <input  class="btn btn-primary" id="bot" type="button" value="cerrar" name="cerrar" >
            </a>
		</td>
	</table>
    </form>
</body>
</html>
       
        
