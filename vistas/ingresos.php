<h1>MOMENTO DE INGRESAR FINANZAS</h1>

<form action="proc/ingresar.php" method="POST">
    <table>
        <tr>
            <td>Fecha</td>
            <td><input type="date" name="fecha_ingreso" id="fecha_ingreso" max="<?=$fecha_actual?>" required></td>
        </tr>
        <tr>
            <td>Monto</td>
            <td><input type="number" name="monto_ingreso" id="monto_ingreso" required></td>
        </tr>
        <tr>
            <td>Comentario</td>
            <td><input type="text" name="comentario_ingreso" id="comentario_ingreso"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Ingresar">
            </td>
        </tr>
    </table>
</form>