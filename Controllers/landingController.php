<?php
require_once('../lib/enginetpl.php'); // Asegúrate de incluir el archivo EngineTpl actualizado

class LandingController {
    public function index() {
        // Cargar el motor de plantillas
        $template = new EngineTpl('../Views/landingView.html'); // Especifica la ubicación de la plantilla

        // Datos para pasar a la vista
        $data = array(
            'title' => 'Página de Inicio',
            'content' => 'Bienvenido a la página de inicio. Aquí puedes agregar contenido adicional.',
        );

        // Asignar variables a la plantilla
        $template->assignVar('title', $data['title']);
        $template->assignVar('content', $data['content']);

        // Imprimir la plantilla en la pantalla
        $template->printToScreen();
    }
}
