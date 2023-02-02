<?php
    require "conexion.php";
    echo "PROC CONSULTAR";

    $sentencia = $base_de_datos->query("SELECT sum(monto_movimiento) as ganancia FROM movimientos;");
    $personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>