<?php

include_once('db/db_Freight.php');

ContadorApu();

function ContadorApu()
{
    $con = new LocalConector();
    $conex = $con->conectar();

    $datos = mysqli_query($conex, "SELECT `AREA`, SUM(`Q_COST`) as SUMA, `MONEDA` FROM `PREMIUM` WHERE ESTATUS = 'C' GROUP BY `MONEDA`, AREA;");

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));
}


?>