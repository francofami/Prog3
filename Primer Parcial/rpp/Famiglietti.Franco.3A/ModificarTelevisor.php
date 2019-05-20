<?php
    
    require_once "./clases/Televisor.php";

    $tipo = $_POST["tipo"];
    $precio = $_POST["precio"];
    $paisOrigen = $_POST["paisOrigen"];
    
    $pathOrigen = $_FILES['foto']['tmp_name'];   
    $pathDestino = $_POST["tipo"].".".$_POST["paisOrigen"].".modificado.".date("His")."."."jpg";

    $juguete = new Juguete($tipo, $precio, $paisOrigen, $pathDestino);

    if($juguete->Modificar() == TRUE)
    {
        move_uploaded_file($pathOrigen, "televisores/imagenes/".$pathDestino);
        header("Location: ./Listado.php", true, 301);
        exit();
    }
    else
    {
        echo "No se pudo modificar";
    }

?>