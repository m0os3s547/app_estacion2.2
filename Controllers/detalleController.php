<?php
// Comprobar si "chipid" se pasa a través de la URL
if (isset($_GET['chipid'])) {
    $chipid = $_GET['chipid'];

    // Cargar el modelo necesario si es aplicable
    include '../Models/estacionModel.php'; // Asegúrate de que el nombre del modelo sea correcto

    // Lógica para obtener los datos de la estación específica desde el modelo
    $estacion = obtenerEstacionPorChipid($chipid); // Define esta función en tu modelo

    // Cargar la plantilla del motor de plantillas
    $template = new EngineTpl('../Views/detalleView.html'); // Ruta correcta a tu plantilla

    // Asignar variables a la plantilla si es necesario
    $template->assignVar('apodo', $estacion['apodo']);
    $template->assignVar('ubicacion', $estacion['ubicacion']);
    $template->assignVar('visitas', $estacion['visitas']);

    // Imprimir la plantilla en pantalla
    $template->printToScreen();
} else {
    // Manejar el caso en el que "chipid" no se pasó a través de la URL
        header("Location: ../Views/error404View.html");
    exit();
    // Puede redirigir al usuario a una página de error o tomar otra acción adecuada.
}

?>
