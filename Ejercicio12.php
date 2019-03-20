<?php

    //$lapicera = array(color=>"Rojo", marca=>"Pelikan", trazo=>"Fino", precio=>200);
    //$lapicera = array(color=>"Azul", marca=>"Parker", trazo=>"Ultrafino", precio=>1000);
    //$lapicera = array(color=>"Negro", marca=>"Bic", trazo=>"Grueso", precio=>20);

    $lapicera['color'] = 'Rojo';
    $lapicera['marca'] = 'Pelikan';
    $lapicera['trazo'] = 'Fino';
    $lapicera['precio'] = 200;

    foreach($lapicera as $clave=>$valor)
    {
        echo $clave.": ".$valor."<br>";
    }

    $lapicera['color'] = 'Negro';
    $lapicera['marca'] = 'Bic';
    $lapicera['trazo'] = 'Grueso';
    $lapicera['precio'] = 50;

    foreach($lapicera as $clave=>$valor)
    {
        echo w$clave.": ".$valor."<br>";
    }

    $lapicera['color'] = 'Azul';
    $lapicera['marca'] = 'Parker';
    $lapicera['trazo'] = 'Ultrafino';
    $lapicera['precio'] = 1000;

    foreach($lapicera as $clave=>$valor)
    {
        echo $clave.": ".$valor."<br>";
    }

?>


    