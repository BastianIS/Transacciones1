<?php
    require "conexion.php";
    echo "PROC CONSULTAR";

    $sentencia = $conexion->query("SELECT sum(monto_movimiento) as ganancia FROM movimientos;");
    $personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>