<?php
    /* Control de opciones */
    $opcion = (isset($_GET["opcion"])) ? $_GET["opcion"] : "consultar";
    
    // Clase de la opción seleccionada
    // $clase_opcion['consultar']  = ($opcion == 'consultar') ? 'opcion_seleccionada' : 'opcion_no_seleccionada';
    // $clase_opcion['insertar']   = ($opcion == 'insertar') ? 'opcion_seleccionada' : 'opcion_no_seleccionada';
    // $clase_opcion['modificar']  = ($opcion == 'modificar') ? 'opcion_seleccionada' : 'opcion_no_seleccionada';
    // $clase_opcion['eliminar']   = ($opcion == 'eliminar') ? 'opcion_seleccionada' : 'opcion_no_seleccionada';
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
        <!-- <link rel="stylesheet" href="css/main.css"> -->
        <script src="js/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/9ca7bdd180.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <!-- Menú superior -->
        <div id="contenedor_menu">
            <b class="display-8 border border-4 border-dark rounded" style="padding:1px 5px; text-align:center; float:left; margin:5px 100px 0px 50px; font-size:larger;">MENÚ DE TRANSACCIONES</b>

            <ul class="lista_menu nav nav-tabs" style="width:600px; text-align:center; float:left; margin:5px 100px 0px 50px;">
                <li class="nav-item">
                    <a href="?opcion=consultar" class="opciones nav-link <?php echo ($opcion == 'consultar') ? 'active' : ''; ?>">Ver Resumen de movimientos</a>
                </li>
                <li class="nav-item">
                    <a href="?opcion=insertar" class="opciones nav-link <?php echo ($opcion == 'insertar') ? 'active' : ''; ?>">Agregar</a>
                </li>
                <li class="nav-item">
                    <a href="?opcion=modificar" class="opciones nav-link <?php echo ($opcion == 'modificar') ? 'active' : ''; ?>">Modificar</a>
                </li>
                <li class="nav-item">
                    <a href="?opcion=eliminar" class="opciones nav-link <?php echo ($opcion == 'eliminar') ? 'active' : ''; ?>">Eliminar</a>
                </li>
            </ul>
            
            <!-- <ul id="lista_menu">
                <li id="item_menu">MENÚ DE TRANSACCIONES</li>
                <li><a href="?opcion=consultar" class="opciones <?php echo $clase_opcion['consultar']; ?>">Ver Resumen de movimientos</a></li>
                <li><a href="?opcion=insertar" class="opciones <?php echo $clase_opcion['insertar']; ?>">Agregar</a></li>
                <li><a href="?opcion=modificar" class="opciones <?php echo $clase_opcion['modificar']; ?>">Modificar</a></li>
                <li><a href="?opcion=eliminar" class="opciones <?php echo $clase_opcion['eliminar']; ?>">Eliminar</a></li>
            </u> -->
        </div>

        <br><br><br>

        <!-- Contenedor contenido principal -->
        <div id="contenedor_principal">
            <div id="contenedor_contenido">
                <!-- Carga de contenido según la opción selecionada (menú) -->
                <?php require "vistas/$opcion.php"; ?>
            </div>
        </div>
    </body>
</html>