<?php
namespace app\utils;

use app\models\Soporte;

class SoporteUtils
{
    /**
     * Devuelve soporte dado su número.
     * @param array $soportes
     * @param int $numSoporte
     * @return Soporte|null
     */
    public static function getSoportePorNumSoporte(array $soportes, int $numSoporte): ?Soporte
    {
        foreach ($soportes as $value) {
            if ($value instanceof Soporte && $value->getNumero() === $numSoporte) {
                return $value;
            }
        }

        return null;
    }
}