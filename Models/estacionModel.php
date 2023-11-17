<?php
require_once('./env.php');

// Función para obtener la lista de todas las estaciones
function obtenerEstaciones() {
    $url = "https://mattprofe.com.ar/proyectos/app-estacion/datos.php?chipid=${chipid}&cant=7"; // URL de la API

    // Realiza una solicitud GET a la API
    $response = file_get_contents($url);

    if ($response === false) {
        die("Error al obtener datos de la API.");
    }

    // Decodifica la respuesta JSON
    $estaciones = json_decode($response, true);

    return $estaciones;
}

// Función para obtener información de una estación específica por su chipid
function obtenerEstacionPorChipid($chipid) {
    $url = "https://mattprofe.com.ar/proyectos/app-estacion/datos.php?chipid=${chipid}&cant=7"; // URL de la API

    // Realiza una solicitud GET a la API
    $response = file_get_contents($url);

    if ($response === false) {
        die("Error al obtener datos de la API.");
    }

    // Decodifica la respuesta JSON
    $estacion = json_decode($response, true);

    return $estacion;
}
?>
