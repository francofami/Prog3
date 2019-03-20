<?php

    $animal = array();
    array_push($animal,"Perro", "Gato", "Raton", "Araña", "Mosca");

    $año = array();
    array_push($año,1986,1996,2015,78,86);

    $lenguaje = array();
    array_push($lenguaje,"php", "mysql", "html5", "typescript", "ajax");

    $todosUnidos = array_merge($animal,$año, $lenguaje);


    foreach($todosUnidos as $nananaclave)
    {
        echo $nananaclave." ";
    }

?>