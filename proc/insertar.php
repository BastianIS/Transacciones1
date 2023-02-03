<?php
    /* Requiero el documento encargado de reaizar la conexión con la DB */
    require "conexion.php";
    
    /* Recibo los parámetros enviados desde el formulario */
    $tipo_movimiento        = $_POST["tipo_movimiento"];
    $fecha_movimiento       = $_POST["fecha_movimiento"];
    $monto_movimiento       = $_POST["monto_movimiento"];
    $comentario_movimiento  = $_POST["comentario_movimiento"];

    // Seteo su correspondiente tipo de dato
    $tipo_movimiento        = intval($tipo_movimiento);
    $monto_movimiento       = intval($monto_movimiento);
    $comentario_movimiento  = (isset($comentario_movimiento)) ? $comentario_movimiento : "NULL";

    // Si el movimiento es tipo 2 (Egreso), el monto debe ser negativo
    if($tipo_movimiento == 2){
        $monto_movimiento *= -1;
    }

    /* Ruteo y validación (TEMPORAL) */
    // echo "<hr>
    //         tipo_movimiento: " . (($tipo_movimiento == 1) ? "Ingreso" : "Egreso" ) . "<br>
    //         fecha_movimiento: " . date("d/m/Y", strtotime($fecha_movimiento)) . "<br>
    //         monto_movimiento: " . number_format($monto_movimiento, 2, ",", ".") . "<br>
    //         comentario_movimiento: $comentario_movimiento";

    /* Declaro y ejecuto transaction y la query */
    $sentencia_transaction    = "START TRANSACTION;";
    $preparacion_transaction  = $conexion->query($sentencia_transaction);

    $sentencia_query    = "INSERT INTO movimientos(monto_movimiento, fecha_movimiento, id_tipo_movimiento, comentario_movimiento, fecha_registro_movimiento) VALUES(?, ?, ?, ?, NOW());";
    $preparacion_query  = $conexion->prepare($sentencia_query);
    $resultado_query    = $preparacion_query->execute([$monto_movimiento, $fecha_movimiento, $tipo_movimiento, $comentario_movimiento]);

    /* Verifico el resultado. Según éste, veo cómo proseguir con la transaction */
    if($resultado_query){
        // Todo correcto
        echo "<hr>Insertado correctamente<hr>";
        
        // Cierro/commit transaction
        $sentencia_transaction    = "COMMIT;";
        $preparacion_transaction  = $conexion->query($sentencia_transaction);

    }else{
        // Error en la inserción
        echo "<hr>Algo salió mal. Verificar.<hr>";
        
        // Devuelvo/rollback transaction
        $sentencia_transaction    = "ROLLBACK;";
        $preparacion_transaction  = $conexion->query($sentencia_transaction);
    }

    // Cierro conexión
    $conexion = null;

    // Salgo del proceso
    exit("<a href='../index.php?opcion=insertar'>Volver</a>");
?>