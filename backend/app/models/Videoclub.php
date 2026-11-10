<?php
namespace app\models;

use app\utils\ClienteUtils;
use app\utils\SoporteUtils;

class Videoclub
{
    private string $nombre;
    private array $productos = [];
    private int $numProductos;
    private array $socios = [];
    private int $numSocios;

    /**
     * @param string $nombre
     */
    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
    }

    private function incluirProducto(Soporte $producto): void {
        $this->productos[] = $producto;
    }

    public function incluirCintaVideo(string $titulo, float $precio, int $duracion): void {
        $this->incluirProducto(new CintaVideo($titulo, count($this->productos), $precio, $duracion));
    }

    public function incluirDvd(string $titulo, float $precio, array $idiomas, string $pantalla): void {
        $this->incluirProducto(new Dvd($titulo, count($this->productos), $precio, $idiomas, $pantalla));
    }

    public function incluirJuego(string $titulo, float $precio, string $consola, int $minJug, int $maxJug): void {
        $this->incluirProducto(new Juego($titulo, count($this->productos), $precio, $consola, $minJug, $maxJug));
    }

    public function incluirSocio(string $nombre, int $maxAlquilaresConcurrentes = 3): void {
        $this->socios[] = new Cliente($nombre, count($this->socios)+1, $maxAlquilaresConcurrentes);
    }

    public function listarProductos(): string {
        return join(
                "</br>",
                array_map(fn($e) => $e->muestraResumen(), $this->productos)
            );
    }

    public function listarSocios(): string {
        return join(
                "</br>",
                array_map(fn($e) => $e->muestraResumen(), $this->socios)
            );
    }

    public function alquilaSocioProducto(int $numeroCliente, int $numeroSoporte): void {
        $cliente = ClienteUtils::getClienteByNum($this->socios, $numeroCliente);
        $soporte = SoporteUtils::getSoportePorNumSoporte($this->productos, $numeroSoporte);

        // Crea un buen formato para el mensaje de error dependiendo de lo que ha fallado.
        if ($cliente === null || $soporte === null) {
            $clienteNoExisteMensaje = $cliente === null? "Cliente con número $numeroCliente no existe": null;
            $soporteNoExisteMensaje = $soporte === null? "Soporte con número $numeroSoporte no existe": null;

            $arrayMensajes = array_filter([$clienteNoExisteMensaje, $soporteNoExisteMensaje], fn($e)=> $e !== null);
            $mensaje = join(" y ", $arrayMensajes);

            echo "<b>[ERROR]</b> No se puede alquilar el soporte porque $mensaje </br>";
            return;
        }

        $cliente->alquilar($soporte);
    }

}