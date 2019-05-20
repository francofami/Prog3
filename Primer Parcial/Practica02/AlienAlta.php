<?php

    require_once "./clases/Alien.php";

    $planeta = $_POST["planeta"];
    $email = $_POST["email"];
    $clave = $_POST["clave"];

    $alien = new Alien($planeta, $email, $clave);

    $alien->GuardarEnArchivo();

?>