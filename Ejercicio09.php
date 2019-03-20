<?php
    //Aplicación 9

    echo "<br> <br> Aplicacion 9 <br> <br>";

    $vecAp9;
    $sumaAp9 = 0;

    for($i=0; $i<5; $i++)
    {
        $vecAp9[$i] = rand();
        $sumaAp9 += $vecAp9[$i];
    }

    //foreach($vecAp9 as $valor)
    {
   //     $sumaAp9 += $valor;
    }

    $cantidadAp9 = count($vecAp9);

    $promedioAp9 = $sumaAp9 / $cantidadAp9;

    echo "Promedio: ".$promedioAp9."<br>";

    if($promedioAp9 > 6)
    {
        echo "Promedio mayor a 6.";
    }
    else if($promedioAp9 < 6)
    {
        echo "Promedio menor a 6.";
    }
    else if($promedioAp9 == 6)
    {
        echo "Promedio igual a 6.";
    }
?>