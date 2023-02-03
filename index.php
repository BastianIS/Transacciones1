<?php
    /* Control de opciones */
    $opcion = (isset($_GET["opcion"])) ? $_GET["opcion"] : "consultar";
    
    // Clase de la opción seleccionada
    $clase_opcion['consultar']  = ($opcion == 'consultar') ? 'opcion_seleccionada' : 'opcion_no_seleccionada';
    $clase_opcion['insertar']   = ($opcion == 'insertar') ? 'opcion_seleccionada' : 'opcion_no_seleccionada';
    $clase_opcion['modificar']  = ($opcion == 'modificar') ? 'opcion_seleccionada' : 'opcion_no_seleccionada';
    $clase_opcion['eliminar']   = ($opcion == 'eliminar') ? 'opcion_seleccionada' : 'opcion_no_seleccionada';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Metadatos del sitio -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Personalizable (título de poestaña y favicon) -->
        <title><?php echo ucfirst($opcion); ?> - Transacciones</title>
        <link rel="icon" type="image/x-icon" href="img/BNIS_icon.png">

        <!-- Archivos enlazados (local y CDN) -->
        <link rel="stylesheet" href="css/main.css">
        <script src="js/script.js"></script>
    </head>
    <body>
        <!-- Menú superior -->
        <div id="contenedor_menu">
            <ul id="lista_menu">
                <li id="item_menu">MENÚ DE TRANSACCIONES</li>
                <li><a href="?opcion=consultar" class="opciones <?php echo $clase_opcion['consultar']; ?>">Ver Resumen de movimientos</a></li>
                <li><a href="?opcion=insertar" class="opciones <?php echo $clase_opcion['insertar']; ?>">Agregar</a></li>
                <li><a href="?opcion=modificar" class="opciones <?php echo $clase_opcion['modificar']; ?>">Modificar</a></li>
                <li><a href="?opcion=eliminar" class="opciones <?php echo $clase_opcion['eliminar']; ?>">Eliminar</a></li>
            </u>
        </div>

        <!-- Contenedor contenido principal -->
        <div id="contenedor_principal">
            <div id="contenedor_contenido">
                <!-- Carga de contenido según la opción selecionada (menú) -->
                <?php require "vistas/$opcion.php"; ?>
            </div>
        </div>
    </body>
</html>