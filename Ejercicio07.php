<?php

//Aplicación 7

    echo "<br> <br> Aplicacion 7 <br> <br>";

    $dia = date('d'."/".'j'."/".'Y');

    echo "<br>".$dia;
    echo "<br>".date(DATE_RSS);
    echo "<br>".date('l'." ".'d'." \"of\" ".'F'." of".'Y');

    $diaA = date('z'); //Me da el día del año (0 a 365)

    if($diaA < 80 || ($diaA >=355 && $diaA<=365))
    {
        echo "<br>Es verano";
    }
    else if($diaA >= 80 && $diaA <161)
    {
        echo "<br>Es otoño";
    }
    else if($diaA >= 161 && $diaA <253)
    {
        echo "<br>Es invierno";
    }
    else if($diaA >= 253 && $diaA <355)
    {
        echo "<br>Es primavera";
    }

?>