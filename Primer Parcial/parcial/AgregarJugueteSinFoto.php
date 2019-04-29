<?php

    require_once "./clases/Juguete.php";

    $juguete = new Juguete($_POST["tipo"], $_POST["precio"], $_POST["paisOrigen"], "");

    if($juguete->Agregar() == TRUE)
    {
        $file = fopen("./archivos/juguetes_sin_foto.txt", "a");

        fwrite($file, date("hi")." - ".$juguete->ToString());

        fclose($file);

        echo "Se añadiò el juguete con èxito!";
    }
    else
    {
        echo $juguete->ToString();
    }

?>