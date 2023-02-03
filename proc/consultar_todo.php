<?php
    /* Requiero el documento encargado de reaizar la conexión con la DB */
    require "conexion.php";

    /* Declaro y ejecuto la query */
    $sentencia_query  = "SELECT
                            m.id_movimiento,
                            m.monto_movimiento,
                            m.fecha_movimiento,
                            m.id_tipo_movimiento,
                            tm.glosa_tipo_movimiento,
                            m.comentario_movimiento,
                            m.fecha_registro_movimiento,
                            m.eliminado_movimiento
                        FROM movimientos m
                            JOIN tipos_movimiento tm ON tm.id_tipo_movimiento = m.id_tipo_movimiento
                        ORDER BY m.id_movimiento DESC;";

    $ejecucion_query = $conexion->query($sentencia_query);
    $resultado_query = $ejecucion_query->fetchAll(PDO::FETCH_OBJ);

    /* Ruteo y validación */
    // print_r($resultado_query);
    
    // Resultados
    foreach($resultado_query as $indice => $resultados){
        // Todo correcto. Declaro Array con el contenido para posteriormente enviarlo en formato JSON
        $array_resultados[$indice]["id_movimiento"] = $resultados->id_movimiento;
        $array_resultados[$indice]["monto_movimiento"] = $resultados->monto_movimiento;
        $array_resultados[$indice]["fecha_movimiento"] = $resultados->fecha_movimiento;
        $array_resultados[$indice]["id_tipo_movimiento"] = $resultados->id_tipo_movimiento;
        $array_resultados[$indice]["glosa_tipo_movimiento"] = $resultados->glosa_tipo_movimiento;
        $array_resultados[$indice]["comentario_movimiento"] = $resultados->comentario_movimiento;
        $array_resultados[$indice]["fecha_registro_movimiento"] = $resultados->fecha_registro_movimiento;
        $array_resultados[$indice]["eliminado_movimiento"] = $resultados->eliminado_movimiento;
		
    }

    print(json_encode($array_resultados));

    // Cierre de conexión
    $conexion = null;
?>