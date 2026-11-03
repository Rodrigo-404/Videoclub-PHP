<?php
include "autoload.php";

use \app\models\Soporte;
use app\models\CintaVideo;
use app\models\Dvd;

$soporte1 = new Soporte("Tenet", 22, 3);
echo "<strong>" . $soporte1->titulo . "</strong>";
echo "<br>Precio: " . $soporte1->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $soporte1->getPrecioConIVA() . " euros";
echo "</br>" . $soporte1->muestraResumen();

echo "</br>";
echo "</br>";

$miCinta = new CintaVideo("Los cazafantasmas", 23, 3.5, 107);
echo "<strong>" . $miCinta->titulo . "</strong>";
echo "<br>Precio: " . $miCinta->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $miCinta->getPrecioConIva() . " euros";
echo "<br>" . $miCinta->muestraResumen();

echo "</br>";