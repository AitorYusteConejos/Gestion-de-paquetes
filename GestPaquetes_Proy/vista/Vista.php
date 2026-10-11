<?php

class Vista
{
    public function mostrarMenu(): void
    {
        echo "\n1. Registrar paquete\n";
        echo "2. Registrar repartidor\n";
        echo "3. Asignar paquete a repartidor\n";
        echo "4. Marcar paquete como entregado\n";
        echo "5. Listar estado global\n";
        echo "6. Salir\n";
    }

    public function mostrarListado(array $repartidores, array $paquetes): void
    {
        echo "\n--- REPARTIDORES ---\n";
        foreach ($repartidores as $repartidor) {
            echo $repartidor->idRepartidor . " - " . $repartidor->nombreRepartidor . "\n";
            foreach ($repartidor->obtenerPaquetes() as $paquete) {
                echo "    " . $paquete->codigoPaquete . "\n";
            }
        }

        echo "\n--- PAQUETES ---\n";
        foreach ($paquetes as $paquete) {
            echo $paquete->codigoPaquete . " - " . $paquete->direccionDestino . " - " . $paquete->obtenerEstado()->value . "\n";
        }
    }
}
