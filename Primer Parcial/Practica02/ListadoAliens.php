<?php

    session_start();
    require_once './clases/Alien.php';
    //var_dump($_COOKIE);

    $aliens = Alien::TraerTodos();

    foreach ($aliens as $alien) 
    {  
            //var_dump($alien);
            //$alienDecode = json_decode($alien);

            $planeta = $alien->_planeta;
            $email = $alien->_email;
            $clave = $alien->_clave;

            $alienClaseAlien = new Alien($planeta, $email, $clave);
            $json = $alienClaseAlien->ToJSON();
            echo $json . "<br>";
        
    }

?>