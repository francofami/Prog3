<?php

    require_once "./clases/Usuario.php";

    $email = $_POST["email"];
    $clave = $_POST["clave"];

    $usuario = new Usuario($email,$clave);

    echo $usuario->GuardarEnArchivo();

?>