<?php


    class Test
    {
        public function MetodoInstancia($request, $response, $next)
        {
            $response->getBody()->write("Metodo de instancia");
            return $next($request, $response);
        }

        public function MetodoEstatico($request, $response, $next)
        {
            $response->getBody()->write("Metodo estatico");
            return $next($request, $response);
        }

        
    }


?>