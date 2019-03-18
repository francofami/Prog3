<?php
/*
    echo 'Hola "mundo"';
    echo "<br>Hola 'mundo'";
    echo "<br>Hola \"mundo\" <br>";
*/    
    //Aplicacion 1
/*
    echo "<br> <br> Aplicacion 1 <br> <br>";
    $nombre = "Franco";
    $apellido = "Famiglietti";
    
    echo $apellido.", ".$nombre."<br>"; //Concateno con .
*/
    //Aplicación 2 y 3
/*   
    $x = -3;
    $y = 15;

    echo "<br> <br> Aplicacion 2 y 3 <br> <br>";
    echo "Valor x= ".$x;
    echo "<br>Valor y= ".$y."<br>Suma= ";
    echo $x+$y."<br>";
*/
    //Aplicación 4
/*
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
*/
    //Aplicación 5
/*
    $a = 6;
    $b = 9;
    $c = 8;

    

    //Aplicación 7

    echo "<br> <br> Aplicacion 7 <br> <br>";

    $dia = date('d'."/".'j'."/".'Y');

    echo "<br>".$dia;
    echo "<br>".date(DATE_RSS);
    echo "<br>".date('l'." ".'d'." \"of\" ".'F'." of".'Y');

    $diaA = date('m');

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
*/

    //Aplicación 9
/*
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
*/
    //Aplicación 10
/*
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
*/



?> 