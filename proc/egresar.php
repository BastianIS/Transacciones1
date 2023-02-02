<?php
    require "conexion.php";
    
    $fecha_egreso = $_POST["fecha_egreso"];
    $monto_egreso = intval($_POST["monto_egreso"]);
    $comentario_egreso = (isset($_POST["comentario_egreso"])) ? $_POST["comentario_egreso"] : null;

    echo "<hr>fecha_egreso: " . date("d/m/Y", strtotime($fecha_egreso)) . "<br>
    monto_egreso: " . number_format($monto_egreso, 2, ",", ".") . "<br>
    comentario_egreso: $comentario_egreso";

    $sentencia = $conexion->prepare("INSERT INTO egresos(monto_egreso, fecha_egreso, comentario_egreso) VALUES(?, ?, ?);");
    $resultado = $sentencia->execute([$monto_egreso, $fecha_egreso, $comentario_egreso]);

    if($resultado === TRUE){
        echo "<hr>Egraso correcto";
    }else{
        echo "<hr>Algo salió mal. Verifika testa";
    }
?>