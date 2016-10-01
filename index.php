<?php

require 'connect.php';
require 'vendor/autoload.php';

$app = new Slim\App();


// registrar actores
$app->map(['GET', 'POST'], '/actores/insert/{nombre}/{telefono}/{direccion}/{pelicula}', function ($request, $response, $args) {

    $nombre = $request->getAttribute('nombre');
    $telefono = $request->getAttribute('telefono');
    $direccion = $request->getAttribute('direccion');
    $pelicula = $request->getAttribute('pelicula');

    require 'connect.php';
    $query = "INSERT INTO actores (nombre, telefono, direccion)
              VALUES ('{$nombre}', '{$telefono}', '{$direccion}')";

    $resultado = $mysqli->query($query);
    $insert_id = $mysqli->insert_id;

    $query2 = "INSERT INTO actores_has_peliculas (actores_id, peliculas_id)
                VALUES ('{$insert_id}', '{$pelicula}')";

    if (!$resultado = $mysqli->query($query2)) echo mysqli_error();

    if ($resultado) {
        echo json_encode(array('message' => "actor registrado con exito", 'bandera' => 1));
    } else {
        echo json_encode(array('message' => "actor registrado con exito", 'bandera' => 2));
    }
});


// consulta actores por id muestra sus datos basicos
$app->map(['GET', 'POST'], '/actores/getid/{idactor}', function ($request, $response, $args) {

    require 'connect.php';
    $idactor = $request->getAttribute('idactor');
    $query = "select * from actores where id=$idactor";

    $resultado = $mysqli->query($query);
    $result = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

    echo json_encode($result);
});



// consulta actores por id pelicula, relacinados a una pelicula
$app->map(['GET', 'POST'], '/actores/getactorspeliculas/{idpelicula}', function ($request, $response, $args) {
    require 'connect.php';
    $idpelicula = $request->getAttribute('idpelicula');

    $query = "SELECT * FROM actores 
              INNER JOIN actores_has_peliculas AS has 
              ON actores.id=has.actores_id 
              WHERE has.peliculas_id=$idpelicula";

    $resultado = $mysqli->query($query);
    $res = array();
    while ($result = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        array_push($res, $result);
    }

    echo json_encode($res);
});


// consulta peliculas por id actor, peliculas relacionadas a un actor
$app->map(['GET', 'POST'], '/actores/getpeliculasactor/{idactor}', function ($request, $response, $args) {
    require 'connect.php';
    $idactor = $request->getAttribute('idactor');

    $query = "SELECT * FROM peliculas 
              INNER JOIN actores_has_peliculas AS has 
              ON peliculas.id=has.peliculas_id 
              WHERE has.actores_id=$idactor";

    $resultado = $mysqli->query($query);
    $res = array();
    while ($result = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        array_push($res, $result);
    }

    echo json_encode($res);
});

// registra peliculas
$app->map(['GET', 'POST'], '/peliculas/insert/{nombre}', function ($request, $response, $args) {
    $nombre = $request->getAttribute('nombre');
    require 'connect.php';
    $query = "INSERT INTO peliculas (nombre)
              VALUES ('{$nombre}')";

    if (!$resultado = $mysqli->query($query)) echo mysqli_error();

    if ($resultado) {
        echo json_encode(array('message' => "pelicula registrado con exito", 'bandera' => 1));
    } else {
        echo json_encode(array('message' => "pelicula registrado con exito", 'bandera' => 2));
    }
});


$app->run();