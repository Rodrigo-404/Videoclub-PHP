<?php
namespace app\models;

use app\interfaces\Resumible;

abstract class Soporte implements Resumible
{
    /**
     * RESPUESTA A LA PRIMERA PREGUNTA:
     * Al hacer abstracta la clase, conseguimos hacer métodos abstractos y poder sobrescribirlos en las clases que la
     * hereden o implementen
     *
     * RESPUESTA A LA SEGUNDA PREGUNTA:
     * No hace falta que los hijos implementen la interfaz Resumible, ya que estaban sobreescribiendo el método del padre.
     */

    private static float $IVA = 0.21;

    public string $titulo;
    protected int $numero;
    private float $precio;

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
        return round($this->precio + ($this->precio * self::$IVA), 2);
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    #[\Override]
    public function muestraResumen(): string {
        return $this->titulo . " - " . $this->numero . ": " . $this->precio . " €";
    }

}