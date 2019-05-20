<?php

    require_once "./clases/Ovni.php"

    $ovnis = Ovni::Traer();

    foreach($ovnis as $ovni)
    {
            echo '<table style="width:100%">
        <tr>
            <th>Tipo</th>
            <th>Velocidad</th> 
            <th>Planeta</th>
            <th> Foto </th>
        </tr>
        <tr>
            <td>' . $ovni->tipo . '</td>
        </tr>
        <tr>
            <td>'. $ovni->velocidad . '</td>
        </tr>
        <tr>
            <td> '. $ovni->planeta . '</td>
        </tr>
        <tr>
            <td> <img source= ' . $ovni->pathFoto .' weight=100 height=100></td>
        </tr>
        </table>';
    }

?>