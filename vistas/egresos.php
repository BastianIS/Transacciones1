<h1>HORA DE EGRESAR FINANZAS</h1>

<form action="proc/egresar.php" method="POST">
    <table>
        <tr>
            <td>Fecha</td>
            <td><input type="date" name="fecha_egreso" id="fecha_egreso" max="<?=$fecha_actual?>" required></td>
        </tr>
        <tr>
            <td>Monto</td>
            <td><input type="number" name="monto_egreso" id="monto_egreso" required></td>
        </tr>
        <tr>
            <td>Comentario</td>
            <td><input type="text" name="comentario_egreso" id="comentario_egreso"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Egresar">
            </td>
        </tr>
    </table>
</form>