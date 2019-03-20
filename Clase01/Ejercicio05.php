<?php

//Aplicación 5

$a = 15;
$b = 66;
$c = 9;

if(($a>$b && $a<$c) || ($a>$c && $a<$b))
{
    echo $a;
} else if(($b < $a && $b > $c) || ($b<$c && $b>$a))
{
    echo $b;
} else if(($c < $b && $c > $a) || ($c<$a && $c>$b))
{
    echo $c;
}else
echo "No hay valor del medio.";

?>