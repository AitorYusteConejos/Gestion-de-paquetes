<?php

require_once __DIR__ . '/../modelo/Paquete.php';
require_once __DIR__ . '/../modelo/Repartidor.php';
require_once __DIR__ . '/../modelo/SistemaLogistica.php';
require_once __DIR__ . '/../vista/view.php';

class Controller
{
    public function __construct(
        private SistemaLogistica $sistema,
        private View $vista,
    ) {}

    public function ejecutar(): void
    {
        do {
            $this->vista->mostrarMenu();
            $opcion = readline("Elige una opción: ");

            try {
                switch ($opcion) {
                    case "1":
                        $codigo = readline("Código del paquete: ");
                        $direccion = readline("Dirección de destino: ");
                        $this->sistema->registrarPaquete(new Paquete($codigo, $direccion));
                        echo "Paquete registrado.\n";
                        break;
                    case "2":
                        $id = (int) readline("ID del repartidor: ");
                        $nombre = readline("Nombre: ");
                        $this->sistema->registrarRepartidor(new Repartidor($id, $nombre));
                        echo "Repartidor registrado.\n";
                        break;
                    case "3":
                        $codigo = readline("Código del paquete: ");
                        $id = (int) readline("ID del repartidor: ");
                        $this->sistema->asignarPaquete($codigo, $id);
                        echo "Paquete asignado, ahora está en ruta.\n";
                        break;
                    case "4":
                        $codigo = readline("Código del paquete: ");
                        $this->sistema->marcarComoEntregado($codigo);
                        echo "Paquete entregado.\n";
                        break;
                    case "5":
                        $this->vista->mostrarListado(
                            $this->sistema->obtenerRepartidores(),
                            $this->sistema->obtenerPaquetes()
                        );
                        break;
                    case "6":
                        echo "Adiós.\n";
                        break;
                    default:
                        echo "Opción no válida.\n";
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage() . "\n";
            }
        } while ($opcion !== "6");
    }
}

$controlador = new Controller(new SistemaLogistica(), new View());
$controlador->ejecutar();