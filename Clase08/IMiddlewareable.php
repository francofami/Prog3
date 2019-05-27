<?php

    interface IMiddlewareable
    {
        public function Verificar($request, $response, $next);
    }

?>