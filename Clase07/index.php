<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once './vendor/autoload.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

/*
¡La primera línea es la más importante! A su vez en el modo de 
desarrollo para obtener información sobre los errores
 (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
  el construido en PHP webserver, entonces usted verá en la salida de la consola 
  que es útil).

  La segunda línea permite al servidor web establecer el encabezado Content-Length, 
  lo que hace que Slim se comporte de manera más predecible.
*/

$app = new \Slim\App(["settings" => $config]);


$app->get('[/]', function (Request $request, Response $response) 
{    
    $response->getBody()->write("GET => Bienvenido!!! a SlimFramework");
    return $response;

});

$app->post('[/]', function (Request $request, Response $response)
{
    $response->getBody()->write("POST => Bienvenido!!! a SlimFramework");
    return $response;
});

$app->put('[/]', function (Request $request, Response $response)
{
    $response->getBody()->write("PUT => Bienvenido!!! a SlimFramework");
    return $response;
});

$app->delete('[/]', function (Request $request, Response $response)
{
    $response->getBody()->write("DELETE => Bienvenido!!! a SlimFramework");
    return $response;
});

$app->get('/saludar', function (Request $request, Response $response) 
{    
    $response->getBody()->write("GET => Hola mundo SlimFramework");
    return $response;

});

$app->get('/mostrar/{nombre}', function (Request $request, Response $response, $args) 
{   
    $nombre = $args['nombre'];
    $nombre = strtoupper($nombre);
    $response->getBody()->write("GET => Hola ".$nombre);
    return $response;
});

$app->post('/mostrar/{nombre}/{apellido}', function (Request $request, Response $response)
{
    $data = array();
    $data['nombre'] = $args['nombre'];
    $data['apellido'] = $args['apellido'];
    $data['id'] = rand(0,99);
    $response->withJson($data);
    $response->withStatus(302);
    //$response->getBody()->write("POST => Bienvenido!!! a SlimFramework");
    return $response;
});

//Recibo un objeto Json en http://localhost:8080/Prog3/Clase07/mostrar/ por POST

$app->post('/mostrar/', function (Request $request, Response $response) 
{
    $args = $request->getParsedBody();
    $data = new stdClass();
    $data->nombre = $args['nombre'];
    $data->apellido = $args['apellido'];
    $data->id = rand(0,99);
    $objResp = $response->withJson($data, 302);

    //$response->getBody()->write("POST => Bienvenido!!! a SlimFramework");
    return $objResp;
});

$app->post('/json/', function (Request $request, Response $response) 
{
    $args = $request->getParsedBody();
    $data = new stdClass();
    $data = $args['json'];

    $obj = json_decode($data);
    //$objResp = $response->getParsedBody($data, 302);

    //$response->getBody()->write("POST => Bienvenido!!! a SlimFramework");
    return $obj->nombre;
});

$app->run();

?>