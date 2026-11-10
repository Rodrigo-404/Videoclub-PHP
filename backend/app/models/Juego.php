<?php
namespace app\models;

class Juego extends Soporte
{
    public string $consola;
    private int $minNumJugadores;
    private int $maxNumJugadores;

    public function __construct(
            string $titulo,
            int $numero,
            float $precio,
            string $consola,
            int $minNumJugadores,
            int $maxNumJugadores
    )
    {
        parent::__construct($titulo, $numero, $precio);
        $this->consola = $consola;
        $this->minNumJugadores = $minNumJugadores;
        $this->maxNumJugadores = $maxNumJugadores;
    }

    public function muestraJugadoresPosibles(): string {
        return match (true) {
            $this->minNumJugadores == 1 && $this->maxNumJugadores == 1 => "Para un jugador",
            $this->minNumJugadores == $this->maxNumJugadores => "Para $this->maxNumJugadores jugadores",
            $this->minNumJugadores < $this->maxNumJugadores => "De $this->minNumJugadores a $this->maxNumJugadores jugadores",
            default => "No se han podido obtener correctamente los datos",
        };
    }

    public function muestraResumen(): string
    {
        return parent::muestraResumen() . ", $this->consola, " . $this->muestraJugadoresPosibles();
    }


    public function __toString(): string
    {
        return $this->muestraResumen();
    }

}