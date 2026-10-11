<?php

require_once __DIR__ . '/modelo/Paquete.php';
require_once __DIR__ . '/modelo/Repartidor.php';
require_once __DIR__ . '/modelo/SistemaLogistica.php';
require_once __DIR__ . '/vista/Vista.php';
require_once __DIR__ . '/controlador/Controlador.php';

$sistemaLogistica = new SistemaLogistica();
$vista = new Vista();
$controlador = new Controlador($sistemaLogistica, $vista);
$controlador->ejecutar();
