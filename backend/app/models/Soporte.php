<?php
namespace app\models;

class Soporte
{
    private static float $IVA = 0.21;

    public string $titulo;
    protected int $numero;
    private float $precio;

    /**
     * @param string $titulo
     * @param int $numero
     * @param float $precio
     */
    public function __construct(string $titulo, int $numero, float $precio)
    {
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getPrecioConIVA(): float {
        return $this->precio + ($this->precio * self::$IVA);
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function muestraResumen(): string {
        return $this->titulo . " - " . $this->numero . ": " . $this->precio . " €";
    }

}