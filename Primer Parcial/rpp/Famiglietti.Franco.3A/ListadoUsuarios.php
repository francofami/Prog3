<?php

    require_once './clases/Usuario.php';

    $usuarios = Usuario::TraerTodos();

    foreach ($usuarios as $usuario) 
    {  
        echo $usuario->ToJSON() . "<br>"; 
    }

?>