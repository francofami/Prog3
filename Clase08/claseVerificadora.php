<?php 

require_once "./Usuario.php";
require_once "./IMiddlewareable.php";

class claseVerificadora implements IMiddlewareable
{
    function Verificar($request, $response, $next)
    {
        if($request->isPost())
        {       
            $getParsedBody = $request->getParsedBody();

            $response->getBody()->write("POST");

            $file = fopen("./usuarios.txt", "a");

            $user = new Usuario($_POST["tipo"], $_POST["nombre"]);

            fwrite($file, $user->ToString());

            fclose($file);

            $response = $next($request, $response);
        }
        else
        if($request->isGet())
        {
            $response->getBody()->write("GET");

            $arrayJson = array();

            $file = fopen("./usuarios.txt", "r");

            while(!feof($file))
            {
                $exploded = explode(" - ", fgets($file));

                $stdClass = new stdClass();

                $stdClass->tipo = $exploded[0];
                $stdClass->nombre = $exploded[1];

                $jsonClass = json_encode($stdClass);

                array_push($arrayJson, $jsonClass);
            }


            fclose($file);

            $response->getBody()->write($arrayJson);
        } 
        else
        {
            $response->getBody()->write(json_encode(array("exito:" => false, "tipo" => "-", "nombre" => "-")));
        }

        return $response;
    } 
}

?>