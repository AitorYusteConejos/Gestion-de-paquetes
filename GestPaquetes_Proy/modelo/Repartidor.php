<?php

class Repartidor
{
    private array $paquetes = [];

    public function __construct(
        public readonly int $idRepartidor,
        public readonly string $nombreRepartidor,
    ) {}

    public function asignarPaquete(Paquete $paquete): void
    {
        $paquete->asignarARuta();
        $this->paquetes[] = $paquete;
    }

    public function obtenerPaquetes(): array
    {
        return $this->paquetes;
    }
}
