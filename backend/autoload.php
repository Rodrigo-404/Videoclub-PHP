<?php

spl_autoload_register( function ($nombreClase ) {
    //include_once $nombreClase . ".php";
    //include_once "app/" . $nombreClase . ".php";

    // Reemplaza las barras invertidas del namespace por barras de directorio
    $ruta = str_replace('\\', '/', $nombreClase);

    // Incluye el archivo con la ruta corregida
    include_once $ruta . ".php";
});