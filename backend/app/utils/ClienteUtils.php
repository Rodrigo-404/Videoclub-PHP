<?php
namespace app\utils;

use app\enums\ReturnMode;
use app\models\Cliente;

class ClienteUtils
{
    /**
     * Devuelve el cliente dado el array de socios y el número de Cliente.
     * @param array $socios
     * @param int $numeroCliente
     * @return Cliente|null
     */
    public static function getClienteByNum(array $socios, int $numeroCliente): ?Cliente
    {
        $result = ArrayUtils::arraySearchByCondition(
            $socios,
            ReturnMode::SINGLE_ELEMENT,
            fn($e) => $e->getNumero() === $numeroCliente
        );

        return $result instanceof Cliente? $result: null;
    }
}