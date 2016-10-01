<?php
date_default_timezone_set('America/Bogota');

$mysqli = new mysqli("localhost", "root", "123", "pruebaws");

/* comprobar la conexión */
if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}

