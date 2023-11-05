<?php
// Redirigir al usuario a landingView.html solo si no hay un error 404
if ($_SERVER['REDIRECT_STATUS'] !== '404') {
    header("Location: Views/landingView.html");
    exit();
}
require_once('env.php');
session_start();

// Incluye el motor de plantillas
include './lib/enginetpl.php';

// Función para redirigir a una página de error 404
function pageNotFound() {
    header('HTTP/1.0 404 Not Found');
    include './Views/error404View.html';
    exit();
}

// Ruta amigable: si la URL es "/panel", se redirige a "panel"
$uri = $_SERVER['REQUEST_URI'];
$baseURL = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
$section = trim(str_replace($baseURL, '', $uri), '/');

// Lógica de autenticación
if (isset($_SESSION[APP_NAME]["user_name"])) {
    // Usuario logueado
    if (empty($section) || $section === "landingView") {
        $section = "panelView";
    }
} else {
    // Usuario no logueado
    if (empty($section) || $section === "panelView") {
        $section = "landingni";
    }
}

// Ruta de controladores
$controller = "./Controllers/{$section}Controller.php";

// Verificar si el controlador existe
if (file_exists($controller)) {
    // Cargar el controlador correspondiente
    include $controller;
} else {
    // Página no encontrada
    pageNotFound();
}
?>