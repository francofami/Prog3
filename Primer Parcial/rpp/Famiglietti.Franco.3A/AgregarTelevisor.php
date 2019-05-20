<?php

    require_once "./clases/Televisor.php";

    $tipo = $_POST["tipo"];
    $precio = $_POST["precio"];
    $paisOrigen = $_POST["paisOrigen"];


    $pathOrigen = $_FILES['foto']['tmp_name'];   
    $pathDestino = $_POST["tipo"].".".$_POST["paisOrigen"].".".date("His")."."."jpg";
        

    $televisor = new Televisor($tipo, $precio, $paisOrigen, $pathDestino);


    //echo $juguete->Verificar($juguetes);

    move_uploaded_file($pathOrigen, "televisores/imagenes/".$pathDestino);

    if($televisor->Agregar() == TRUE)
    {
        header("Location: ./Listado.php", true, 301);
        exit();
    }

    
    else
    {
        json_decode('"exito":"false", "mensaje":"no se pudo agregar"');
    }

?>