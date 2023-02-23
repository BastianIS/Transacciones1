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

    <table class="table table-striped">
        <thead>
            <tr>
                <th class='text-center col-sm-1'>ID</th>
                <th class='text-center'>Fecha del registro</th>
                <th class='text-center'>Monto</th>
                <th class='text-center'>Fecha de movimiento</th>
                <th class='text-center'>Tipo de movimiento</th>
                <th class='text-center'>Comentario</th>
                <th class='text-center col-sm-1'>Eliminado</th>
                <th class='text-center'>Acciones</th>
            </tr>
        </thead>
        <tbody id="data_tabla"></tbody>

<?php
    // Resultados
    foreach($data as $indice => $resultados){

        print("
            <form action='proc/modificar.php' method='POST'>
            <tr " . (($resultados->eliminado_movimiento) ? "class='table-danger'" : "") . ">
                <td class=' col-sm-1'><input type='number' name='id_mov' class='form-control input-sm' placeholder='ID Movimiento' value='" . $resultados->id_movimiento . "' disabled required></td>
                <td class=''><input type='datetime' name='fecha_reg' class='form-control' placeholder='Fecha de Registro' value='" . $resultados->fecha_registro_movimiento . "' disabled required></td>
                <td class=''><input type='number' name='monto' class='form-control' placeholder='Monto Movimiento' value='" . $resultados->monto_movimiento . "' required></td>
                <td class=''><input type='date' name='fecha_mov' class='form-control' placeholder='Fecha Movimiento' value='" . $resultados->fecha_movimiento . "' required></td>
                <td class=''>
        ");

        foreach($tipo_movimiento as $resultados_tm)
            print(
                $resultados_tm->glosa_tipo_movimiento .
                "<input type='radio' name='tipo_mov' value='" . $resultados_tm->id_tipo_movimiento . "'
                " . (($resultados->id_tipo_movimiento == $resultados_tm->id_tipo_movimiento) ? "checked" : "") . ">&nbsp;
            ");

        print(" 
                </td>
                <td class=''><input type='text' name='comentario' class='form-control' placeholder='Comentario Movimiento' value='" . $resultados->comentario_movimiento . "'></td>
                <td class=' col-sm-1'><input type='checkbox' name='eliminado' " . (($resultados->eliminado_movimiento) ? "checked":"") . "></td>
                <td class=''>
                    <button type='button' class='btn btn-outline-success' onclick='modificar_item()'>
                        <i class='fa fa-floppy-o' aria-hidden='true'></i>
                    </button>
                    &nbsp;
                    <button type='button' class='btn btn-outline-danger' onclick='eliminar_item()'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>
                </td>
            </tr>
            </form>
        ");
    }

    // Cierre de conexión
    $conexion = null;
?>