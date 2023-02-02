<?php
    $opcion = (isset($_GET["opcion"])) ? $_GET["opcion"] : "consultar";
    
    $clase_opcion['consultar']  = ($opcion == 'consultar') ? 'opcion_seleccionada' : 'opcion_no_seleccionada';
    $clase_opcion['insertar']   = ($opcion == 'insertar') ? 'opcion_seleccionada' : 'opcion_no_seleccionada';
    $clase_opcion['modificar']  = ($opcion == 'modificar') ? 'opcion_seleccionada' : 'opcion_no_seleccionada';
    $clase_opcion['eliminar']   = ($opcion == 'eliminar') ? 'opcion_seleccionada' : 'opcion_no_seleccionada';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?=ucfirst($opcion)?> - Transacciones</title>

        <style>
            .opciones{
                color: white;
                text-decoration: none;
            }

            .opcion_seleccionada{
                background: green;
            }
            
            .opcion_no_seleccionada{
                background: gray;
            }
            
        </style>
    </head>
    <body>
        <ul>
            <li>MENÚ DE TRANSACCIONES</li>
            <li><a href="?opcion=consultar" class="opciones <?=$clase_opcion['consultar']?>">Ver Resumen de movimientos</a></li>
            <li><a href="?opcion=insertar" class="opciones <?=$clase_opcion['insertar']?>">Agregar</a></li>
            <li><a href="?opcion=modificar" class="opciones <?=$clase_opcion['modificar']?>">Modificar</a></li>
            <li><a href="?opcion=eliminar" class="opciones <?=$clase_opcion['eliminar']?>">Eliminar</a></li>
        </u>
        
        <?php require "vistas/$opcion.php"; ?>

    </body>
</html>