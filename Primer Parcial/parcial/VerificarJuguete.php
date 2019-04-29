<?php

    require_once "./clases/Juguete.php";

    $juguetes = Juguete::Traer();

    $tipo = $_GET["tipo"];
    $paisOrigen = $_GET["paisOrigen"];
    $flag=0;
    $flagOrigen = 0;

    foreach($juguetes as $juguete)
    {
        $flag = 1;
        $flagOrigen=1;

        if(strcmp($tipo, $juguete->tipo) == 0)
        {
            $flag = 2;  
        }

        if(strcmp($paisOrigen, $juguete->paisOrigen) == 0)
        {
            $flagOrigen = 2;

            if($flag==2)
            {
                $juguete->ToString()." - Precio con IVA: ".$juguete->CalcularIVA();
                break;
            }      
        }
     }

     if($flag == 1)
     {
         echo "El tipo y el pais de origen no coinciden.";
     }
     else if($flag == 2)
     {
         echo "El tipo coincide pero el pais de origen no.";
     }
     else if($flagOrigen == 2 )
     {
         echo "El pais de origen coincide pero el tipo no.";
     }

?>