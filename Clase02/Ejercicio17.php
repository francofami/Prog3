<?php

echo Validar("Recuperatorio", 50)."<br>";
echo Validar("Recuperatorio", 5)."<br>";
echo Validar("A ver que pasa", 5)."<br>";
echo Validar("A ver que pasa", 50);

function Validar($palabra, $max)
{
    $retorno = 0;

    if(strlen($palabra) <= $max)
    {
        if($palabra == "Recuperatorio" || $palabra == "Parcial" || $palabra == "Programacion")
        {
            $retorno = 1;
        }
    }

    return $retorno;
}

?>