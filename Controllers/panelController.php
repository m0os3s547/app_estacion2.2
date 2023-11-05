<?php
// Cargar el modelo necesario si es aplicable
include '../Models/estacionModel.php'; // Asegúrate de que el nombre del modelo sea correcto

// Lógica para obtener los datos de las estaciones desde el modelo
$estaciones = obtenerEstaciones(); // Define esta función en tu modelo

// Cargar la plantilla del motor de plantillas
$template = new EngineTpl('../Views/panelView.html'); // Ruta correcta a tu plantilla

// Asignar variables a la plantilla si es necesario
$template->assignVar('estaciones', $estaciones);

// Imprimir la plantilla en pantalla
$template->printToScreen();
?>
