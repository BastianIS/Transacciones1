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

    /* Ruteo y validación */
    // print_r($resultado_query);
    echo "<table>";
    
    // Resultados
    if($resultado_query[0]->total_registros){
        // Todo correcto
        echo "<tr><td>Total de Transacciones:</td><td>" . $resultado_query[0]->total_registros . "</td></tr>";
		echo "<tr><td>Ganancias Hasta Hoy:</td><td>$" . $resultado_query[0]->sumatoria_general . "<td></tr>";
        echo "<tr><td colspan=2><hr></td></tr>";
        echo "<tr><td>Ganancias de Hoy:</td><td>$" . $resultado_query[0]->sumatoria_hoy . "</td></tr>";
		echo "<tr><td>Ganacias del Mes Actual:</td><td>$" . $resultado_query[0]->sumatoria_mes_actual . "</td></tr>";
		echo "<tr><td>Ganancias del Año Actual:</td><td>$" . $resultado_query[0]->sumatoria_anio_actual . "</td></tr>";
        echo "<tr><td colspan=2><hr></td></tr>";
        echo "<tr><td>Monto Total de Ingresos:</td><td>$" . $resultado_query[0]->ingresos_totales . "</td></tr>";
		echo "<tr><td>Monto Total de Egresos:</td><td>$" . $resultado_query[0]->egresos_totales . "</td></tr>";
		echo "<tr><td>Monto Total Movido:</td><td>$" . $resultado_query[0]->monto_total_movido . "</td></tr>";
    }else{
        // Sin resultado o error
        echo "<tr><td><h2>Error en la consulta.</h2></td></tr>";
    }

    echo "</table>";

    // Cierre de conexión
    $conexion = null;
?>