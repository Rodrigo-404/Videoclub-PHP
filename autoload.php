<?php

spl_autoload_register( function ($nombreClase ) {
    include_once $nombreClase . ".php";
    include_once "app/" . $nombreClase . ".php";
});