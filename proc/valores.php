<?php
    require "conexion.php";
    $sentencia = $base_de_datos->query("SELECT sum(monto_movimiento) as ganancia FROM movimientos;");
    $personas = $sentencia->fetchAll(PDO::FETCH_OBJ);