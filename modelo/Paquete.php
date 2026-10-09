<?php

class paquete
{
    private string $estado = 'pendiente';
    public function __construct(
        public readonly string $codigo,
        public readonly string $direccion,
        
    ) {}

    public function asignarARuta(): void
    {
        if ($this->estado === 'pendiente') {
            $this->estado = 'en ruta';
        } 
        
    }

    public function marcarComoEntregado(): void
    {
        if ($this->estado === 'en ruta'){
            $this->estado = 'entregado';
        }
    }

    public function obterEstado(): void
    {
        return $this->estado;
    }

}
?>