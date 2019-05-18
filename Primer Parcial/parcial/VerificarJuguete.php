<?php

    require_once "./clases/Juguete.php";

    $juguetes = Juguete::Traer();

    $tipo = $_GET["tipo"];
    $paisOrigen = $_GET["paisOrigen"];
    
    $contador1 = 0;
    $contador2 = 0;
    $flag = 0;

    foreach($juguetes as $juguete)
    {
        if($tipo == $juguete->tipo && $paisOrigen == $juguete->pais)
        {
            $jugueteClaseJuguete = new Juguete($juguete->tipo, $juguete->precio, $juguete->pais, $juguete->foto);
            echo $jugueteClaseJuguete->ToString()."Precio con IVA: ".$jugueteClaseJuguete->CalcularIVA();
            $flag = 1;
            break;
        } 

        if($tipo == $juguete->tipo && $paisOrigen != $juguete->pais)
        {
            $contador1 += 1;
        }
        

        if($tipo != $juguete->tipo && $paisOrigen == $juguete->pais)
        {
            $contador2 += 1;
        }
    }

    if($contador1>=1 && $contador2==0)
    {
        echo "<br>El tipo coincide pero el pais de origen no.<br>";
    }
    else if($contador1 == 0 && $contador2>=1)
    {
        echo "<br>El pais de origen coincide pero el tipo no.<br>";
    }
    else if($contador1 == 0 && $contador2 == 0 && $flag == 0)
    {
        echo "<br>El tipo y el pais de origen no coinciden.<br>";
    }
    else if($contador1>=1 && $contador2>=1)
    {
        echo "<br>El tipo y el pais estan en la base de datos pero no coinciden.<br>";
    }

    
?>