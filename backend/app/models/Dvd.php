<?php
namespace app\models;
require_once ("Soporte.php");

class Dvd extends Soporte
{
    public array $idiomas;
    private string $formatoPantalla;

    public function __construct(string $titulo, int $numero, float $precio, array $idiomas, string $formatoPantalla)
    {
        parent::__construct($titulo, $numero, $precio);
        $this->idiomas = $idiomas;
        $this->formatoPantalla = $formatoPantalla;
    }




}