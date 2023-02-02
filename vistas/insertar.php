<?php
    // Define fecha actual para limitar fecha en el formulario
    date_default_timezone_set("America/Santiago");
    $fecha_actual = date('Y-m-d');
?>

<h1>Nueva Transacción</h1>

<form action="proc/insertar.php" method="POST">
    <table>
        <tr>
            <td colspan=2>Tipo de movimiento: </td>
        </tr>
        <tr>
            <td colspan=2>
                <label for="tipo_ingreso">Ingreso </label><input type="radio" name="tipo_movimiento" id="tipo_ingreso" value="1" checked>
                <label for="tipo_egreso">Egreso </label><input type="radio" name="tipo_movimiento" id="tipo_egreso" value="2">
            </td>
        </tr>
        <tr>
            <td>Fecha: </td>
            <td><input type="date" name="fecha_movimiento" id="fecha_movimiento" value="<?=$fecha_actual?>" max="<?=$fecha_actual?>" required></td>
        </tr>
        <tr>
            <td>Monto: </td>
            <td><input type="number" name="monto_movimiento" id="monto_movimiento" required></td>
        </tr>
        <tr>
            <td>Comentario: </td>
            <td><input type="text" name="comentario_movimiento" id="comentario_movimiento"></td>
        </tr>
        <tr>
            <td colspan=2>
                <input type="submit" value="Agregar">
            </td>
        </tr>
    </table>
</form>