<?php
namespace app\models;

class CintaVideo extends Soporte
{
    private int $duracion;

    public function __construct(string $titulo, int $numero, float $precio, int $duracion)
    {
        parent::__construct($titulo, $numero, $precio);
        $this->duracion = $duracion;
    }

    #[\Override]
    public function muestraResumen(): string
    {
        return parent::muestraResumen() . ", " . $this->duracion . " min";
    }

    public function __toString(): string
    {
        return $this->muestraResumen();
    }

}