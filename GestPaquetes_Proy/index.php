<?php

require_once __DIR__ . '/../controlador/Controller.php';
require_once __DIR__ . '/../modelo/SistemaLogistica.php';
require_once __DIR__ . '/../vista/View.php';
require_once __DIR__ . '/../modelo/Paquete.php';
require_once __DIR__ . '/../modelo/Repartidor.php';

$controlador = new Controller(new SistemaLogistica(), new View());
$controlador->ejecutar();