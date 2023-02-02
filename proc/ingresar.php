<?php
    require "conexion.php";
    
    $fecha_ingreso = $_POST["fecha_ingreso"];
    $monto_ingreso = intval($_POST["monto_ingreso"]);
    $comentario_ingreso = (isset($_POST["comentario_ingreso"])) ? $_POST["comentario_ingreso"] : null;

    echo "<hr>fecha_ingreso: " . date("d/m/Y", strtotime($fecha_ingreso)) . "<br>
    monto_ingreso: " . number_format($monto_ingreso, 2, ",", ".") . "<br>
    comentario_ingreso: $comentario_ingreso";

    $sentencia = $conexion->prepare("INSERT INTO ingresos(monto_ingreso, fecha_ingreso, comentario_ingreso) VALUES(?, ?, ?);");
    $resultado = $sentencia->execute([$monto_ingreso, $fecha_ingreso, $comentario_ingreso]);

    if($resultado === TRUE){
        echo "<hr>Insertado correctamente";
    }else{
        echo "<hr>Algo salió mal. Verifikeichan manin";
    }
?>