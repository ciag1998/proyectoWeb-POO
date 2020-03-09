<?php
try {
    $conexion = new PDO('pgsql:dbname=proyecto;host=localhost;','postgres','12345');
    echo "Conexion Existosa"; 
} catch (Exception $t) {
    echo "No Hay Conexion";
    die();
}

?>