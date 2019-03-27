<?php

$letras =  array('H', 'O', 'L', 'A');

for($i=0; $i< sizeof($letras); $i++)
{
    echo $letras[$i];
}

Invertir($letras);

function Invertir($palabra)
{
    echo "<br>";

    for($i=sizeof($palabra)-1; $i>=0 ; $i--)
    {
        echo $palabra[$i];
    }
}