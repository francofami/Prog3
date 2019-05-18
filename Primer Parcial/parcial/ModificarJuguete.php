<?php

    require_once "./clases/Juguete.php";

    $tipo = $_POST["tipo"];
    $precio = $_POST["precio"];
    $paisOrigen = $_POST["paisOrigen"];
    
    $pathOrigen = $_FILES['foto']['tmp_name'];   
    $pathDestino = "juguetesModificados/".$_POST["tipo"].".".$_POST["paisOrigen"].".modificado.".date("His").".".pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

    $juguete = new Juguete($tipo, $precio, $paisOrigen, $pathDestino);

    if($juguete->Modificar() == TRUE)
    {
        move_uploaded_file($pathOrigen, $pathDestino);
        header("Location: ./Listado.php", true, 301);
        exit();
    }
    else
    {
        echo "No se pudo modificar";
    }

?>