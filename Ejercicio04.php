<?php

//Aplicación 4

    echo "<br> <br> Aplicacion 4 <br> <br>";

    $suma = 0;
    $entero = 1;

    while($suma + $entero <= 1000)
    {
        echo $entero."<br>";

        $suma += $entero;

        $entero += 1;
    }

    echo "Suma= ".$suma;
?>