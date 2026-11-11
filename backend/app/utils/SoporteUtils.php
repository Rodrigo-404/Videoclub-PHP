<?php
namespace app\utils;

use app\enums\ReturnMode;
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
        $result = ArrayUtils::searchByCondition(
            $soportes,
            ReturnMode::SINGLE_ELEMENT,
            fn($s) => $s->getNumero() === $numSoporte
        );

        return $result instanceof Soporte? $result: null;
    }
}