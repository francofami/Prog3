<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once './vendor/autoload.php';
require_once "./test.php";
require_once "./claseVerificadora.php";
require_once "./Usuario.php";

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

$mw1 = function ($request, $response, $next){
        $response->getBody()->write('Estoy en middleware 1<br>');

        if($request->isPost())
        {       
            $getParsedBody = $request->getParsedBody();

            if($getParsedBody["tipo"] == 'admin')
            {
                echo "<br>".$getParsedBody["nombre"];
                $response = $next($request, $response);
                echo "<br>Estoy por POST";
                return $response;
            } 
            else
            {
                echo "No tiene permisos para pasar por POST.";
            }
        }

        if($request->isGet())
        {
            echo "<br>Estoy por GET";
        } 

        echo "<br>dsfdsfds";
        return $response;
};

$app = new \Slim\App(["settings" => $config]);

$app->group('/api', function () 
{
    $this->get('[/]', function (Request $request, Response $response) 
    {   
        $response->getBody()->write("GET => Bienvenido!!! a SlimFramework");
        return $response;

    });

    $this->post('[/]', function (Request $request, Response $response)
    {
        $response->getBody()->write("POST => Bienvenido!!! a SlimFramework");
        return $response;
    });

    
/*})->add(function ($request, $response, $next){
    $response->getBody()->write('mw1<br>');
    $response = $next($request, $response);
    $response->getBody()->write('<br>mw2');
    return $response;*/ 

    })->add($mw1); //Otra opcion de hacer lo anterior

//});

$app->group('/api2', function () 
{
    $this->get('[/]', function (Request $request, Response $response) 
    {   
        $response->getBody()->write("GET => Bienvenido!!! a SlimFramework");
        return $response;

    });

    $this->post('[/]', function (Request $request, Response $response)
    {
        $response->getBody()->write("POST => Bienvenido!!! a SlimFramework");
        return $response;
    });

    //return $response;

})->add(\Test::class . "::MetodoEstatico");

    //})->add(\Test::class . ":MetodoInstancia");

$app->group('/apiUsuario', function () 
{
    $this->get('[/]', function (Request $request, Response $response) 
    {   
        $response->getBody()->write("GET => Bienvenido!!! a SlimFramework");
        return $response;

    });

    $this->post('[/]', function (Request $request, Response $response)
    {
        $response->getBody()->write("POST => Bienvenido!!! a SlimFramework");
        return $response;
    });

    //return $response;

})->add(\claseVerificadora::class . ":Verificar");


$app->run();

?>