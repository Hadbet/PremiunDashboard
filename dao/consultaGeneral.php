<?php

include_once('db/db_Freight.php');

ContadorApu();

function ContadorApu()
{
    $con = new LocalConector();
    $conex = $con->conectar();

    $datos = mysqli_query($conex, "SELECT `RECOVERY`, SUM(`Q_COST`) AS SUMA,`MONEDA` FROM `PREMIUM` WHERE `MONEDA` = 'USD' and ESTATUS = 'C' GROUP BY `RECOVERY`, `MONEDA` UNION ALL SELECT `RECOVERY`, SUM(`Q_COST`) AS SUMA,`MONEDA` FROM `PREMIUM` WHERE `MONEDA` = 'MXN' and ESTATUS = 'C' GROUP BY `RECOVERY`, `MONEDA`;");

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));
}


?>