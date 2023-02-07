<?php
    /* Requiero el documento encargado de reaizar la conexión con la DB */
    require "conexion.php";

    /* Declaro y ejecuto la query */
    // Data
    $sentencia_query  = "SELECT
                            m.id_movimiento,
                            m.monto_movimiento,
                            m.fecha_movimiento,
                            m.id_tipo_movimiento,
                            m.comentario_movimiento,
                            m.fecha_registro_movimiento,
                            m.eliminado_movimiento
                        FROM movimientos m
                        ORDER BY m.id_movimiento DESC;";

    $ejecucion_query = $conexion->query($sentencia_query);
    $data = $ejecucion_query->fetchAll(PDO::FETCH_OBJ);

    // Tipos movimientos
    $sentencia_query  = "SELECT
                            tm.id_tipo_movimiento,
                            tm.glosa_tipo_movimiento
                        FROM  tipos_movimiento tm
                        ORDER BY 1 DESC;";

    $ejecucion_query = $conexion->query($sentencia_query);
    $tipo_movimiento = $ejecucion_query->fetchAll(PDO::FETCH_OBJ);

    /* Ruteo y validación */
    // print_r($data);
?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Monto</th>
                <th>Fecha de movimiento</th>
                <th>Tipo de movimiento</th>
                <th>Comentario</th>
                <th>Fecha del registro</th>
                <th>Eliminado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="data_tabla"></tbody>

<?php
    // Resultados
    foreach($data as $indice => $resultados){

        print("
            <form action='proc/modificar.php' method='POST'>
            <tr>
                <td><input type='number' name='id_mov' placeholder='ID Movimiento' value='" . $resultados->id_movimiento . "' disabled required></td>
                <td><input type='datetime' name='fecha_reg' placeholder='Fecha de Registro' value='" . $resultados->fecha_registro_movimiento . "' disabled required></td>
                <td><input type='number' name='monto' placeholder='Monto Movimiento' value='" . $resultados->monto_movimiento . "' required></td>
                <td><input type='date' name='fecha_mov' placeholder='Fecha Movimiento' value='" . $resultados->fecha_movimiento . "' required></td>
                <td>
        ");

        foreach($tipo_movimiento as $resultados_tm)
            print(
                $resultados_tm->glosa_tipo_movimiento .
                " <input type='radio' name='tipo_mov' value='" . $resultados_tm->id_tipo_movimiento . "'
                " . (($resultados->id_tipo_movimiento==$resultados_tm->id_tipo_movimiento)?"checked":"") . ">
            ");

        print(" 
                </td>
                <td><input type='text' name='comentario' placeholder='Comentario Movimiento' value='" . $resultados->comentario_movimiento . "'></td>
                <td><input type='checkbox' name='eliminado' " . (($resultados->eliminado_movimiento)?"checked":"") . "></td>
                <td>
                    <button><i class='fa fa-trash' aria-hidden='true'></i></button>
                    <button><i class='fa fa-pencil' aria-hidden='true'></i></button>
                </td>
            </tr>
            </form>
        ");
    }

    // Cierre de conexión
    $conexion = null;
?>