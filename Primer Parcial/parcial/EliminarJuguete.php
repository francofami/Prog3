<?php

    require_once "./clases/Juguete.php";

    $tipo = $_POST["tipo"];
    $precio = $_POST["precio"];
    $paisOrigen = $_POST["paisOrigen"];


    $juguete = new Juguete($tipo, $precio, $paisOrigen, "");

    if($juguete->Eliminar() == TRUE)
    {
        
        header("Location: ./Listado.php", true, 301);
        exit();
    }
    else
    {
        echo "No se pudo eliminar";
    }

?>