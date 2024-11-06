<?php

include_once('db/db_Freight.php');

ContadorApu();

function ContadorApu()
{
    $con = new LocalConector();
    $conex = $con->conectar();

    $datos = mysqli_query($conex, "SELECT SUM(CASE WHEN `ESTATUS` = 'C' THEN 1 ELSE 0 END) AS CountC, SUM(CASE WHEN `ESTATUS` = 'R' THEN 1 ELSE 0 END) AS CountR, SUM(CASE WHEN `ESTATUS` = 'PL' THEN 1 ELSE 0 END) AS CountPL FROM `PREMIUM`;");

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));
}


?>