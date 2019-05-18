<?php
    
    require_once "./clases/Juguete.php";

    $tipo = $_POST["tipo"];
    $precio = $_POST["precio"];
    $paisOrigen = $_POST["paisOrigen"];


    $pathOrigen = $_FILES['foto']['tmp_name'];   
    $pathDestino = "juguetes/imagenes/".$_POST["tipo"].".".$_POST["paisOrigen"].".".date("His").".".pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        
    
    $juguete = new Juguete($tipo, $precio, $paisOrigen, $pathDestino);

    $juguetes = Juguete::Traer();

    //echo $juguete->Verificar($juguetes);

    if($juguete->Verificar($juguetes) == 1)
    {
        move_uploaded_file($pathOrigen, $pathDestino);

        if($juguete->Agregar() == TRUE)
        {
            header("Location: ./Listado.php", true, 301);
            exit();
        }

    }
    else
    {
        echo "No se pudo agregar: el juguete ya existe.";
    }
?>