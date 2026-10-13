<?php

enum EstadoPaquete: string
{
    case Pendiente = 'pendiente';
    case EnRuta = 'en ruta';
    case Entregado = 'entregado';
}

class Paquete
{
    private EstadoPaquete $estado = EstadoPaquete::Pendiente;

    public function __construct(
        public readonly string $codigoPaquete,
        public readonly string $direccionDestino,
    ) {}

    public function asignarARuta(): void
    {
        if ($this->estado === EstadoPaquete::Pendiente) {
            $this->estado = EstadoPaquete::EnRuta;
        } else {
            throw new Exception(
                "El paquete que intenta asignar a ruta no está pendiente"
            );
        }
    }

    public function marcarComoEntregado(): void
    {
        if ($this->estado === EstadoPaquete::EnRuta) {
            $this->estado = EstadoPaquete::Entregado;
        } else {
            throw new Exception(
                "El paquete que intenta marcar como entregado no está en ruta"
            );
        }
    }

    public function obtenerEstado(): EstadoPaquete
    {
        return $this->estado;
    }
}
