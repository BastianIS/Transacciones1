<?php
    require "conexion.php";
    
    $tipo_movimiento        = intval($_POST["tipo_movimiento"]);
    $fecha_movimiento       = $_POST["fecha_movimiento"];
    $monto_movimiento       = intval($_POST["monto_movimiento"]);
    $comentario_movimiento  = (isset($_POST["comentario_movimiento"])) ? $_POST["comentario_movimiento"] : null;

    echo "<hr>
            tipo_movimiento: " . (($tipo_movimiento == 1) ? "Ingreso" : "Egreso" ) . "<br>
            fecha_movimiento: " . date("d/m/Y", strtotime($fecha_movimiento)) . "<br>
            monto_movimiento: " . number_format($monto_movimiento, 2, ",", ".") . "<br>
            comentario_movimiento: $comentario_movimiento";

    $query = "INSERT INTO movimientos(monto_movimiento, fecha_movimiento, tipo_movimiento, comentario_movimiento, fecha_registro) VALUES(?, ?, ?, ?, ?);";
    $sentencia = $conexion->prepare($query);
    $resultado = $sentencia->execute([$monto_movimiento, $fecha_movimiento, $tipo_movimiento, $comentario_movimiento, "NOW()"]);

    if($resultado){ //=== TRUE){
        echo "<hr>Insertado correctamente";
    }else{
        echo "<hr>Algo salió mal. Verifikeichan manin";
    }
?>