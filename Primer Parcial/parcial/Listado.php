<?php

    require_once "./clases/Juguete.php";

    $juguetes = Juguete::Traer();

    $tabla = "<table><thead><tr><th>Tipo</th><th>Precio</th><th>Pais</th><th>Imagen</th></thead></tr>";


    foreach($juguetes as $juguete)
    {
        $juguete->ToString();
        //$precio = $juguetes[$i]->Precio();
        //$tipo = Juguete::Tipo($juguetes[$i]);
        //$precio = $juguete->Precio();
        //$paisOrigen = $juguete->PaisOrigen();
        //$pathImagen = $juguete->PathImagen();

        //$tabla .= "<tr><td>$tipo</td><td>$precio</td><td>$paisOrigen</td><td><img src='localhost:8080/parcial/$pathImagen'/></td></tr>";
    }

    //echo $tabla .= "</table>";
?>