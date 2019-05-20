<?php

    require_once "./clases/Ovni.php";

    $tipo = $_POST["tipo"];
    $velocidad = $_POST["velocidad"];
    $planetaOrigen = $_POST["planetaOrigen"];

    $ovni = new Ovni($tipo, $velocidad, $planetaOrigen);

    if($ovni->Agregar() == true)
    {
        echo '{"exito":"true","mensaje":"Se agregó el ovni con éxito."}';
    }
    else
    {
        echo '{"exito":"false","mensaje":"El ovni no se pudo agregar."}';
    }

?>