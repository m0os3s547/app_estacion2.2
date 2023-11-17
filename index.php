<?php
session_start();
include('env.php');
if (!isset($_SESSION[APP_NAME])) {
    $_SESSION[APP_NAME] = array();
}

include('./lib/enginetpl.php');
$seccion = isset($_GET["seccion"]) ? $_GET["seccion"] : "";

$_ROUTE = explode("/", $seccion);
// router

if ($_ROUTE[0] != "") {
    $section = $_ROUTE[0];

    $controllerFileName = "{$section}Controller.php";
    $controllerFilePath = "./Controllers/{$controllerFileName}";

    if (!file_exists($controllerFilePath)) {
        $section = "error404";
        $controllerFileName = "{$section}Controller.php";
        $controllerFilePath = "./Controllers/{$controllerFileName}";
    }
} else {
    $section = "landing";
    $controllerFileName = "{$section}Controller.php";
    $controllerFilePath = "./Controllers/{$controllerFileName}";
}


// ...



include $controllerFilePath;

?>
