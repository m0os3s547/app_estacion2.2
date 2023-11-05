<?php
// Asumiendo que engineController.php está en la misma carpeta que lib
include '../lib/enginetpl.php';

// Crear una instancia del motor de plantillas
$template = new EngineTpl('../Views/engineView.html');

// Definir datos dinámicos a pasar a la vista
$title = "Título de la Página";
$content = "Este es el contenido dinámico que se muestra en la página.";

// Asignar los datos a la vista
$template->assignVar('TITLE', $title);
$template->assignVar('CONTENT', $content);

// Renderizar la vista
$template->printToScreen();
?>
