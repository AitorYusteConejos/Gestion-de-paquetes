<?php

class SistemaLogistica
{
    private array $paquetes = [];
    private array $repartidores = [];

    public function registrarPaquete(Paquete $paquete): void
    {
        foreach ($this->paquetes as $paqueteRegistrado) {
            if ($paqueteRegistrado->codigoPaquete === $paquete->codigoPaquete) {
                throw new Exception(
                    "Ya existe un paquete con ese código."
                );
            }
        }
        $this->paquetes[] = $paquete;
    }

    public function registrarRepartidor(Repartidor $repartidor): void
    {
        foreach ($this->repartidores as $repartidorRegistrado) {
            if ($repartidorRegistrado->idRepartidor === $repartidor->idRepartidor) {
                throw new Exception(
                    "Ya existe un repartidor con ese ID."
                );
            }
        }
        $this->repartidores[] = $repartidor;
    }

    public function buscarPaquete(string $codigoPaquete): Paquete
    {
        foreach ($this->paquetes as $paquete) {
            if ($paquete->codigoPaquete === $codigoPaquete) {
                return $paquete;
            }
        }
        throw new Exception(
            "No existe ningún paquete con el código " . $codigoPaquete . "."
        );
    }

    public function buscarRepartidor(int $idRepartidor): Repartidor
    {
        foreach ($this->repartidores as $repartidor) {
            if ($repartidor->idRepartidor === $idRepartidor) {
                return $repartidor;
            }
        }
        throw new Exception(
            "No existe ningún repartidor con el ID " . $idRepartidor . "."
        );
    }

    public function asignarPaquete(string $codigoPaquete, int $idRepartidor): void
    {
        $paquete = $this->buscarPaquete($codigoPaquete);
        $repartidor = $this->buscarRepartidor($idRepartidor);
        $repartidor->asignarPaquete($paquete);
    }

    public function marcarComoEntregado(string $codigoPaquete): void
    {
        $paquete = $this->buscarPaquete($codigoPaquete);
        $paquete->marcarComoEntregado();
    }

    public function obtenerPaquetes(): array
    {
        return $this->paquetes;
    }

    public function obtenerRepartidores(): array
    {
        return $this->repartidores;
    }
}