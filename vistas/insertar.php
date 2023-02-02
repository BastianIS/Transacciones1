<?php
    // Define fecha actual para limitar fecha en el formulario
    date_default_timezone_set("America/Santiago");
    $fecha_actual = date('Y-m-d');
?>

<h1>Nueva Transacción</h1>

<form action="proc/insertar.php" method="POST">
    <table>
        <tr>
            <td>Tipo de movimiento: </td>
            <td>
                <label for="tipo_ingreso">Ingreso </label><input type="radio" name="tipo_movimiento" value="1" id="tipo_ingreso" checked>
                <label for="tipo_egreso">Egreso </label><input type="radio" name="tipo_movimiento" value="2" id="tipo_egreso">
            </td>
        </tr>
        <tr>
            <td>Fecha: </td>
            <td><input type="date" name="fecha_movimiento" id="fecha_movimiento" max="<?=$fecha_actual?>" required></td>
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
            <td colspan="2">
                <input type="submit" value="Agregar">
            </td>
        </tr>
    </table>
</form>