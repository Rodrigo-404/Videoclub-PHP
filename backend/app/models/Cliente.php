<?php
namespace app\models;

use app\utils\ArrayUtils;
use app\utils\SoporteUtils;

class Cliente
{
    public string $nombre;
    private int $numero;
    private array $soportesAlquilados = [];
    private int $numSoportesAlquilados = 0;
    private int $maxAlquilerConcurrente;

    /**
     * @param string $nombre
     * @param int $numero
     * @param int $maxAlquilerConcurrente
     */
    public function __construct(string $nombre, int $numero, int $maxAlquilerConcurrente=3)
    {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): void
    {
        $this->numero = $numero;
    }

    public function getNumSoportesAlquilados(): int
    {
        return $this->numSoportesAlquilados;
    }

    public function muestraResumen(): string {
        return "Cliente $this->nombre tiene " . count($this->soportesAlquilados) . " alquileres";
    }

    public function tieneAlquilado(Soporte $s): bool{
        return in_array($s, $this->soportesAlquilados);
    }

    public function alquilar(Soporte $s): bool {
        if($this->tieneAlquilado($s) || $this->numSoportesAlquilados > $this->maxAlquilerConcurrente) {
            echo "<b>[ERROR]</b> Supera alquiler: " . ($this->numSoportesAlquilados > $this->maxAlquilerConcurrente) . " Tiene alquilado: " . $this->tieneAlquilado($s)."</br>";
            echo "<b>[ERROR]</b> No se puede alquilar el soporte con número " . $s->getNumero() . " para el cliente $this->nombre </br>";
            return false;
        }

        $this->numSoportesAlquilados++;
        $this->soportesAlquilados[] = $s;

        return true;
    }

    public function devolver(int $numSoporte): bool {
        $soporte = SoporteUtils::getSoportePorNumSoporte($this->soportesAlquilados, $numSoporte);
        $index = ArrayUtils::array_indexOf($this->soportesAlquilados, $soporte);

        if (!in_array($soporte, $this->soportesAlquilados)) {
            echo "<b>[ERROR]</b> El número de soporte $numSoporte no está alquilado.</br>";
            return false;
        }

        $this->numSoportesAlquilados--; // Restamos número de soportes alquilados.
        unset($this->soportesAlquilados[$index]);

        // REINDEXAR
        $this->soportesAlquilados = array_values($this->soportesAlquilados);

        return true;
    }

    public function listaAlquileres(): void {
        echo "$this->nombre tiene $this->numSoportesAlquilados: </br>" .
            join(" | ",  $this->soportesAlquilados) . "</br>";
    }
}