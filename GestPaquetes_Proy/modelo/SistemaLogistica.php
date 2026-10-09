<?php

class SistemaLogistica
{
    private array $paquetes = [];
    private array $repartidores = [];

    public function registrarPaquete(Paquete $paquete): void
    {
        foreach ($this->paquetes as $p) {
            if ($p->codigo === $paquete->codigo) {
                throw new Exception(
                    "Ya existe un paquete con ese código."
                );
            }
        }
        $this->paquetes[] = $paquete;
    }

    public function registrarRepartidor(Repartidor $repartidor): void
    {
        foreach ($this->repartidores as $r) {
            if ($r->id === $repartidor->id) {
                throw new Exception(
                    "Ya existe un repartidor con ese ID."
                );
            }
        }
        $this->repartidores[] = $repartidor;
    }

    public function buscarPaquete(string $codigo): Paquete
    {
        foreach ($this->paquetes as $p) {
            if ($p->codigo === $codigo) {
                return $p;
            }
        }
        throw new Exception(
            "No existe ningún paquete con el código $codigo."
        );
    }

    public function buscarRepartidor(int $id): Repartidor
    {
        foreach ($this->repartidores as $r) {
            if ($r->id === $id) {
                return $r;
            }
        }
        throw new Exception(
            "No existe ningún repartidor con el ID $id."
        );
    }

    public function asignarPaquete(string $codigo, int $idRepartidor): void
    {
        $paquete = $this->buscarPaquete($codigo);
        $repartidor = $this->buscarRepartidor($idRepartidor);
        $repartidor->asignarPaquete($paquete);
    }

    public function marcarComoEntregado(string $codigo): void
    {
        $paquete = $this->buscarPaquete($codigo);
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