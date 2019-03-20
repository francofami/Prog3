<?php

//Aplicación 6

$operador = "+";

$op1 = 4;
$op2 = 2;

switch($operador)
{
    case "+":
    echo $op1+$op2;
    break;
    case "-":
    echo $op1-$op2;
    break;
    case "*":
    echo $op1*$op2;
    break;
    case "/":
    echo $op1/$op2;
    break;
    default:
    echo "Operador inexistente";
}


?>