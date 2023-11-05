<?php
include '../lib/enginetpl.php';

// Cargar la plantilla del motor de plantillas
$template = new EngineTpl('../Views/error404View.html'); // Ruta correcta a tu plantilla

// Imprimir la plantilla en pantalla
$template->printToScreen();
?>
