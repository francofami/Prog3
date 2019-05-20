<?php

    require_once "./clases/Televisor.php";

    $televisores = Televisor::Traer();


    $tabla = "<table><thead><tr><th>Tipo</th><th>Precio</th><th>Pais</th><th>Imagen</th></thead></tr>";


    foreach($televisores as $televisor)
    {
        $tvJSON = json_decode($televisor->ToJSON());
        $tabla .= "<tr><td>$tvJSON->tipo</td><td>$tvJSON->precio</td><td>$tvJSON->paisOrigen</td><td><img src='./televisores/imagenes/$tvJSON->path'height=100 weight=100/></td></tr>";
        
    }

    echo $tabla .= "</table>";

?>