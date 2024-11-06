<?php

include_once('db/db_Freight.php');

$tipo = $_GET('tipo');

ContadorApu($tipo);

function ContadorApu($tipo)
{
    $con = new LocalConector();
    $conex = $con->conectar();

    $datos = mysqli_query($conex, "SELECT `RECOVERY`, SUM(`Q_COST`) as SUMA, `MONEDA`, MONTH(`FECHA_INS`) as Mes FROM `PREMIUM` WHERE ESTATUS = 'C' AND `RECOVERY` = '$tipo' GROUP BY `RECOVERY`, `MONEDA`, Mes;
");

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));
}


?>