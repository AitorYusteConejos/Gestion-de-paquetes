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
        public readonly string $codigo,
        public readonly string $direccion,
    ) {}

    public function asignarARuta(): void
    {
        if ($this->estado === EstadoPaquete::Pendiente) {
            $this->estado = EstadoPaquete::EnRuta;
        }else{
            throw new Exception(
                "El paquete que intenta asignar no esta en estado pendiente"
            );
        }
    }

    public function marcarComoEntregado(): void
    {
        if ($this->estado === EstadoPaquete::EnRuta) {
            $this->estado = EstadoPaquete::Entregado;
        }else{
            throw new exception(
                "El paquete que intenta entregar no esta en ruta"
            );
        }
    }

    public function obtenerEstado(): EstadoPaquete
    {
        return $this->estado;
    }

}