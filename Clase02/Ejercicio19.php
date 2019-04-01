<?php

require_once "Clases Ejercicio 19/FiguraGeometrica.php";
require_once "Clases Ejercicio 19/Rectangulo.php";
require_once "Clases Ejercicio 19/Triangulo.php";

$rectangulo01 = new Rectangulo(5,7);
$rectangulo01->setColor("rojo");
echo $rectangulo01->ToString();

$triangulo01 = new Triangulo(10,7);
echo $triangulo01->ToString();

?>