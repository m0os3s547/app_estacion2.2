<?php
require_once('./Models/estacionModel.php');
require_once('./lib/enginetpl.php');

// Verificar si "chipid" se pasa a través de la URL
if (isset($_GET['chipid'])) {
    $chipid = filter_input(INPUT_GET, 'chipid', FILTER_SANITIZE_STRING);

    // Obtener información de la estación por chipid utilizando la función del modelo
// ... (código previo)

// Obtener información de la estación por chipid utilizando la función del modelo
$estacion = obtenerEstacionPorChipid($chipid);

// Verificar si la estación existe
if ($estacion) {
    // Crear la instancia del motor de plantillas
   $tpl = new EngineTpl('./Views/detalleView.html');

// Asignar la variable 'chipid' a la plantilla
$tpl->assignVar('chipid', $chipid);

// Asignar otras variables según sea necesario
if (isset($estacion['apodo'])) {
    $tpl->assignVar('apodo', $estacion['apodo']);
}

if (isset($estacion['ubicacion'])) {
    $tpl->assignVar('ubicacion', $estacion['ubicacion']);
}

if (isset($estacion['visitas'])) {
    $tpl->assignVar('visitas', $estacion['visitas']);
}

// Imprimir la plantilla en pantalla
$tpl->printToScreen();
} else {
    // Manejar el caso en el que no se encontró la estación
    header("Location: ./Views/error404View.html");
    exit();
}

// ... (código posterior)

} else {
    // Manejar el caso en el que "chipid" no se pasó a través de la URL
    header("Location: ./Views/error404View.html");
    exit();
}
?>
