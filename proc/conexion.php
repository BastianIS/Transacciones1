<?php
    /* Declaro las credenciales para realizar la conexión con la DB */
    $servidor   = "localhost";
    $nombre_db  = "transacciones";
    $usuario    = "root";
    $clave      = "";

    /* Inicio la conexión + verificando excepciones */
    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$nombre_db", $usuario, $clave);      
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // echo "Conexión realizada Satisfactoriamente";
    }catch(PDOException $e){
        echo "<h2>La conexión ha fallado: " . $e->getMessage() . "</h2>";
    }
?>