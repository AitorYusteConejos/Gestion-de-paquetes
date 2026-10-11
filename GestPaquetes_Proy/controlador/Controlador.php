<?php

class Controlador
{
    public function __construct(
        private SistemaLogistica $sistemaLogistica,
        private Vista $vista,
    ) {}

    public function ejecutar(): void
    {
        do {
            $this->vista->mostrarMenu();
            $opcion = readline("Elige una opción: ");

            try {
                switch ($opcion) {
                    case "1":
                        $codigoPaquete = readline("Código del paquete: ");
                        $direccionDestino = readline("Dirección de destino: ");
                        $this->sistemaLogistica->registrarPaquete(new Paquete($codigoPaquete, $direccionDestino));
                        echo "Paquete registrado.\n";
                        break;
                    case "2":
                        $idRepartidor = (int) readline("ID del repartidor: ");
                        $nombreRepartidor = readline("Nombre: ");
                        $this->sistemaLogistica->registrarRepartidor(new Repartidor($idRepartidor, $nombreRepartidor));
                        echo "Repartidor registrado.\n";
                        break;
                    case "3":
                        $codigoPaquete = readline("Código del paquete: ");
                        $idRepartidor = (int) readline("ID del repartidor: ");
                        $this->sistemaLogistica->asignarPaquete($codigoPaquete, $idRepartidor);
                        echo "Paquete asignado, ahora está en ruta.\n";
                        break;
                    case "4":
                        $codigoPaquete = readline("Código del paquete: ");
                        $this->sistemaLogistica->marcarComoEntregado($codigoPaquete);
                        echo "Paquete entregado.\n";
                        break;
                    case "5":
                        $this->vista->mostrarListado(
                            $this->sistemaLogistica->obtenerRepartidores(),
                            $this->sistemaLogistica->obtenerPaquetes()
                        );
                        break;
                    case "6":
                        echo "Adiós.\n";
                        break;
                    default:
                        echo "Opción no válida.\n";
                }
            } catch (Exception $excepcion) {
                echo "Error: " . $excepcion->getMessage() . "\n";
            }
        } while ($opcion !== "6");
    }
}