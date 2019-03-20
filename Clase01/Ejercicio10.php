<?php
    //Aplicación 10

    echo "<br> <br> Aplicacion 10 <br> <br>";

    $vecAp10 = array();
    $j = 0;
    $i = 1;

    while(1==1)
    {
        if($i%2 != 0)
        {
            $vecAp10[$j] = $i;
            $j+=1;
        }

        $i+=1;

        if(count($vecAp10) == 10)
        break;
    }

    for($i=0; $i<10;$i++)
    {
        echo $vecAp10[$i]."<br>";
    }

    foreach($vecAp10 as $numAp10)
    {
        echo $numAp10."<br>";
    }

    $k = 0;

    while(count($vecAp10) <= 10)
    {
        echo $numAp10[$k]."<br>";

        $k +=1;
    }
?>