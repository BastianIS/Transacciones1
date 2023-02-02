<?php
    $opcion = (isset($_GET["opcion"])) ? $_GET["opcion"] : "home";

    $COLOR_SELECCIONADO = "rgb(0, 204, 0)";
    $COLOR_NO_SELECCIONADO = "rgb(225, 225, 208)";

    date_default_timezone_set("America/Santiago");
    $fecha_actual = date('Y-m-d');

    if($opcion == "ingresos"){
        $color_opcion["ingresos"] = $COLOR_SELECCIONADO;
        $color_opcion["egresos"] = $color_opcion["home"] = $COLOR_NO_SELECCIONADO;
    }elseif($opcion == "egresos"){
        $color_opcion["egresos"] = $COLOR_SELECCIONADO;
        $color_opcion["ingresos"] = $color_opcion["home"] = $COLOR_NO_SELECCIONADO;
    }else{
        $color_opcion["home"] = $COLOR_SELECCIONADO;
        $color_opcion["ingresos"] = $color_opcion["egresos"] = $COLOR_NO_SELECCIONADO;
    } 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?=ucfirst($opcion)?> - Transacciones</title>
    </head>
    <body>
        <ul>
            <li>MENÚ</li>
            <li><a href="?opcion=home" style="background: <?=$color_opcion["home"]?>">Home</a></li>
            <li><a href="?opcion=ingresos" style="background: <?=$color_opcion["ingresos"]?>">Ingresos</a></li>
            <li><a href="?opcion=egresos" style="background: <?=$color_opcion["egresos"]?>">Egresos</a></li>
        </ul>

<?php require "vistas/$opcion.php"; ?>

    </body>
</html>