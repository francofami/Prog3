<?php

    require_once "./clases/Televisor.php";

    $tipo = $_POST["tipo"];
    $precio = $_POST["precio"];
    $paisOrigen = $_POST["paisOrigen"];

    $televisor = new Televisor($tipo, $precio, $paisOrigen);

    if($televisor->Agregar() == true)
    {
        echo '{"exito":"true","mensaje":"Se agregó el televisor con éxito."}';
    }
    else
    {
        echo '{"exito":"false","mensaje":"El televisor no se pudo agregar."}';
    }

?>