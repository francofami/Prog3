<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Firebase\JWT\JWT;

require_once './vendor/autoload.php';
require_once './Usuario.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$mw1 = function ($request, $response, $next){

    $parsedBody = $request->getParsedBody();

    if(isset($parsedBody["nombre"]) && isset($parsedBody["apellido"]) && isset($parsedBody["division"]))
    {
        $response->getBody()->write(json_encode("Los datos estan seteados", 409));
        $response = $next($request, $response);
    }
    else 
    {
        $response->withJson("Los datos no estan seteados", 409);
    }

    return $response;

};

$mw2 = function ($request, $response, $next){

    $parsedBody = $request->getParsedBody();

    if($parsedBody["nombre"] != "" && $parsedBody["apellido"] != "" && $parsedBody["division"] != "")
    {
        $response->getBody()->write(json_encode("Los datos estan cargados", 409));
        $response = $next($request, $response);
    }
    else 
    {
        $response = $response->withJson("Los datos estan vacios", 409);
    }

    return $response;

};

$app = new \Slim\App(["settings" => $config]);

$app->group('/jwt', function()
{
    $this->post('[/]', function (Request $request, Response $response)
    {
        $datos = $request->getParsedBody();
        $usuario = new Usuario($datos["nombre"], $datos["apellido"], $datos["division"]);
        
        if(Usuario::Verificar($usuario) == TRUE)
        {
            $jwt = JWT::encode($usuario, "claveSuperSecreta");
            $retorno = $response->withJson($jwt, 200);
        }
        else
        {
            $retorno = $response->withJson("El usuario no existe", 409);
        }

        //$user = array("nombre" => $datos["nombre"], "apellido" => $datos["apellido"], "division" => $datos["division"]);
        

        return $retorno;
    });

    $this->post('/Mostrar[/]', function (Request $request, Response $response)
    {
        $ArrayDeParametros = $request->getParsedBody();
        $token = $ArrayDeParametros['token'];
        $flag= 0;

        if(empty($token) || $token === "")
        {
            $flag = 1;
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
            $flag = 1;
            throw new Exception("Token no válido!!! --> " . $exception->getMessage());
        }

        if($flag == 0)
        {
            echo $ArrayDeParametros['nombre'];
            echo $ArrayDeParametros['apellido'];
            echo $ArrayDeParametros['division'];
        }
    });
    
})->add($mw1)->add($mw2);

$app->run();