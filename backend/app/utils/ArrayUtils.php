<?php
namespace app\utils;
use app\enums\ReturnMode;
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
     * Devuelve el primer elemento que coincida con la condición de búsqueda.
     * @param array $array
     * @param ReturnMode $returnMode - Especifica si debe devolver un array o un elemento
     * @param callable $callback
     * @return object|array|null
     */
    public static function arraySearchByCondition(array $array, ReturnMode $returnMode, callable $callback): object | array | null
    {
        $filteredElements = array_filter($array, $callback);

        if($returnMode === ReturnMode::SINGLE_ELEMENT ) {
            return $filteredElements[0];
        }

        return $filteredElements;
    }

}