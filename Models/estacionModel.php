<?php
require_once('../env.php');

// Función para obtener la lista de todas las estaciones
function obtenerEstaciones() {
    // Establece la conexión a la base de datos usando las constantes definidas en env.php
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($mysqli->connect_error) {
        die("Error de conexión a la base de datos: " . $mysqli->connect_error);
    }

    $query = "SELECT * FROM estaciones";
    $result = $mysqli->query($query);

    if ($result) {
        $estaciones = [];
        while ($row = $result->fetch_assoc()) {
            $estaciones[] = $row;
        }
        // Cierra la conexión a la base de datos
        $mysqli->close();
        return $estaciones;
    } else {
        // Cierra la conexión a la base de datos
        $mysqli->close();
        return [];
    }
}

// Función para obtener información de una estación específica por su chipid
function obtenerEstacionPorChipid($chipid) {
    // Establece la conexión a la base de datos usando las constantes definidas en env.php
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($mysqli->connect_error) {
        die("Error de conexión a la base de datos: " . $mysqli->connect_error);
    }

    $chipid = $mysqli->real_escape_string($chipid);

    $query = "SELECT * FROM estaciones WHERE chipid = '$chipid'";
    $result = $mysqli->query($query);

    if ($result && $result->num_rows > 0) {
        $estacion = $result->fetch_assoc();
    } else {
        $estacion = null;
    }

    // Cierra la conexión a la base de datos
    $mysqli->close();
    return $estacion;
}

?>
