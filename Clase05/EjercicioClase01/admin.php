<?php

    $pass = $_POST['password'];    
    $passHash = password_hash($pass, PASSWORD_BCRYPT);

    //El algoritmo BCRYPT nos creará una cadena de 72 caracteres como máximo, 
    //la cual es distinta cada vez que se codifica, por lo que para comprobar 
    //que la contraseña introducida es la correcta debemos usar la función password_verify():

    password_verify($pass, $passHash);

?>