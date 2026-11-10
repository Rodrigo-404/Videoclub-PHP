<?php
namespace app\models;

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

    public function muestraResumen(): string {
        return parent::muestraResumen() . ", " . join("-", $this->idiomas) .", $this->formatoPantalla";
    }

    public function __toString(): string
    {
        return $this->muestraResumen();
    }

}