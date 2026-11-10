<?php
namespace app\utils;
use app\models\Soporte;

class ArrayUtils
{
    /**
     * Devuelve el index de un elemento dado un array.
     * @param array $array
     * @param $element
     * @return int
     */
    public static function array_indexOf(array $array, $element): int
    {
        foreach ($array as $key => $value) {
            if ($value === $element) {
                return $key;
            }
        }
        return -1;
    }

    /**
     * Devuelve si hay alguna coincidencia de la condición del callback en el array.
     * @param array $array
     * @param callable $callback Condición de búsqueda.
     * @return bool
     */
    public static function array_find(array $array, callable $callback): bool
    {
        foreach ($array as $key=>$item) {
            if($callback($item, $key)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Devuelve soporte dado su número.
     * @param array $soportes
     * @param int $numSoporte
     * @return Soporte|null
     */
    public static function getSoportePorNumSoporte(array $soportes, int $numSoporte): ?Soporte
    {
        foreach ($soportes as $value) {
            if ($value->getNumero() === $numSoporte) {
                return $value;
            }
        }

        return null;
    }
}