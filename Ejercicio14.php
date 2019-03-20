<?php

//Array indexado

$animal = array("Perro", "Gato", "Raton", "Araña", "Mosca");

$año = array(1986,1996,2015,78,86);

$lenguaje = array("php", "mysql", "html5", "typescript", "ajax");

$arrayIndexado = array
($animal, $año, $lenguaje);

foreach($arrayIndexado as $arrayI)
{
     
    foreach($arrayI as $item)  
 	{
 		echo $item ." ";
 	}
     
     echo "<br>";
}

//Array asociativo

$arrayAsociativo['Animal'] = $animal;
$arrayAsociativo['Año'] = $año;
$arrayAsociativo['Lenguaje'] = $lenguaje;

foreach($arrayAsociativo as $arrayA)
{
     
    foreach($arrayA as $item)  
 	{
 		echo $item ." ";
 	}
     
     echo "<br>";
}


?>