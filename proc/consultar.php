<?php
    /* Requiero el documento encargado de reaizar la conexión con la DB */
    require "conexion.php";

    /* Declaro y ejecuto la CALL (Procedimiento Almacenado) y la query para rescatar el valor devuelto */
    $sentencia_query  = "CALL PA_Calculos_Generales(
                            @total_registros,
                            @sumatoria_general,
                            @monto_total_movido,
                            @ingresos_totales,
                            @egresos_totales,
                            @sumatoria_hoy,
                            @sumatoria_mes_actual,
                            @sumatoria_anio_actual);

                        SELECT
                            @total_registros as total_registros,
                            @sumatoria_general as sumatoria_general,
                            @monto_total_movido as monto_total_movido,
                            @ingresos_totales as ingresos_totales,
                            @egresos_totales as egresos_totales,
                            @sumatoria_hoy as sumatoria_hoy,
                            @sumatoria_mes_actual as sumatoria_mes_actual,
                            @sumatoria_anio_actual as sumatoria_anio_actual;";

    $ejecucion_query = $conexion->query($sentencia_query);
    $resultado_query = $ejecucion_query->fetchAll(PDO::FETCH_OBJ);

    // print_r($resultado_query);
    
    // Resultado
    if($resultado_query[0]->total_registros){
        // Todo correcto
        echo "<h2>TOTALES:</h2>";
		echo "<h3>Total de Transacciones: " . $resultado_query[0]->total_registros . "</h3>";
		echo "<h3>Ganancias de Hoy: $" . $resultado_query[0]->sumatoria_hoy . "</h3>";
		echo "<h3>Ganacias del Mes Actual: $" . $resultado_query[0]->sumatoria_mes_actual . "</h3>";
		echo "<h3>Ganancias del Año Actual: $" . $resultado_query[0]->sumatoria_anio_actual . "</h3><hr>";
        echo "<h2>Históricos:</h2>";
		echo "<h3>Ganancias Hasta Hoy: $" . $resultado_query[0]->sumatoria_general . "</h3>";
		echo "<h3>Monto Total de Ingresos: $" . $resultado_query[0]->ingresos_totales . "</h3>";
		echo "<h3>Monto Total de Egresos: $" . $resultado_query[0]->egresos_totales . "</h3>";
		echo "<h3>Monto Total Movido: $" . $resultado_query[0]->monto_total_movido . "</h3>";
    }else{
        // Sin resultado o error
        echo "<h2>Error en la consulta.</h2>";
    }

    // Cierre de conexión
    $conexion = null;
?>