<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Firebase\JWT\JWT;

require_once './vendor/autoload.php';
$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);

$app->group('/', function () 
{
    $this->post('Crear[/]', function (Request $request, Response $response)
    {
        $datos = $request->getParsedBody();
        $user = array("nombre" => $datos["nombre"], "apellido" => $datos["apellido"], "division" => $datos["division"]);
        $jwt = JWT::encode($user, "claveSuperSecreta");
        return $response->withJson($jwt, 200);
    });

    $this->post('VerificarToken[/]', function (Request $request, Response $response) 
    {   
        $ArrayDeParametros = $request->getParsedBody();
        $token = $ArrayDeParametros['token'];

        if(empty($token) || $token === "")
        {
            throw new Exception("El token está vacio!!!");
        }

        try
        {
            //DECODIFICO EL TOKEN RECIBIDO
            $decodificado = JWT::decode(
                $token,
                "claveSuperSecreta",
                ['HS256']
            );
        }
        
        catch(Exception $exception)
        {
            throw new Exception("Token no válido!!! --> " . $exception->getMessage());
        }

        return "Token OK!!";

    });


    $this->post('ObtenerPayload[/]', function (Request $request, Response $response)
    {
        $ArrayDeParametros = $request->getParsedBody();
        $token = $ArrayDeParametros['token'];

        if(empty($token) || $token === "")
        {
            throw new Exception("El token está vacio!!!");
        }

            //DECODIFICO EL TOKEN RECIBIDO
            $decodificado = JWT::decode(
                $token,
                "claveSuperSecreta",
                ['HS256']
            );
            
        return $response->withJson($decodificado,200);
    });

});


$app->run();