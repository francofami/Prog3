<?php

echo "El numero 1 es par: ".EsPar(1)."<br>";
echo "El numero 2 es par: ".EsPar(2)."<br>";
echo "El numero 1 es impar: ".EsImpar(1)."<br>";
echo "El numero 2 es impar: ".EsImpar(2);

function EsPar($entero)
{
    $retorno = FALSE;

    if($entero % 2 == 0)
    {
        $retorno = TRUE;        
    }

    return $retorno;
}

function EsImpar($entero)
{
    $retorno = FALSE;

    if(EsPar($entero)==FALSE)
    {
        $retorno = TRUE;
    }

    return $retorno;
}

?>