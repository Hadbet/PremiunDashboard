<?php

include_once('db/db_Freight.php');
$filtro = $_GET['filtro'];

ContadorApu($filtro);

function ContadorApu($filtro)
{
    $con = new LocalConector();
    $conex = $con->conectar();

    $bandera = "1=1";

    if ($filtro == 'PO45'){
        $bandera = "REFERENCE like '45%'";
    }
    if ($filtro == 'OTROS'){
        $bandera = "not REFERENCE like '45%'";
    }

    $datos = mysqli_query($conex, "SELECT RECOVERY, SUM(Q_COST) AS SUMA,MONEDA FROM PREMIUM WHERE MONEDA = 'USD' and ESTATUS = 'C' and  $bandera GROUP BY RECOVERY, MONEDA 
                                        UNION ALL 
                                        SELECT RECOVERY, SUM(Q_COST) AS SUMA,MONEDA FROM PREMIUM WHERE MONEDA = 'MXN' and ESTATUS = 'C' and  $bandera GROUP BY RECOVERY, MONEDA;");

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));
}


?>