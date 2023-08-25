<?php
include_once 'orden.php';


class ApiOrden
{


    function getAll()
    {

        $nomina = new Orden();
        $nominas = array();
        $nominas['ordenes'] = array();

        $res2 = $nomina->GETOrden();
        if ($res2->rowCount()) {


            while ($row = $res2->fetch(PDO::FETCH_ASSOC)) {
                $item2 = array(
                    "OrdenN" => $row['numero_orden'],
                    "cliente" => $row['nombre_cliente'],
                    "auxiliar" => $row['nombre_auxiliar'],
                    "recepcionista" => $row['nombre_recepcionista'],
                    "fecha" => $row['fecha'],
                    "total" => $row['total'],
                    "estado" => $row['id_estado'],

                );

                array_push($nominas["ordenes"], $item2);
            }


            echo json_encode($nominas);
        } else {
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }
}
