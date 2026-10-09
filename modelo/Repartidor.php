<?php
class Repartidor
{
    private array $paquetes = [];

    public function__construct(
        public readonly int $id,
        public readonly string $nombre,
    ) {}

    public function asignarPaquete(Paquete $paquete): void 
    {
        $this->paquetes[] = $paquete;
        
    }
}
?>