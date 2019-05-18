<?php

    require_once "./clases/Juguete.php";

    $juguetes = Juguete::Traer();

    $tabla = "<table><thead><tr><th>Tipo</th><th>Precio</th><th>Pais</th><th>Imagen</th></thead></tr>";


    foreach($juguetes as $juguete)
    {
        //$juguete->ToString();
        $tabla .= "<tr><td>$juguete->tipo</td><td>$juguete->precio</td><td>$juguete->paisOrigen</td><td><img src='./$juguete->foto' height=100 weight=100/></td></tr>";
        
    }

    echo $tabla .= "</table>";

    
?>