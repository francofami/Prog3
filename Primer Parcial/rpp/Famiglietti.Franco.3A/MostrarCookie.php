<?php
    require_once './clases/Usuario.php';
    
    $email= isset($_GET["email"]) ? $_GET["email"]: " ";
    
    if($email != " ")
    {
        $auxEmail=str_replace("." ,"_" ,$email);

        if(isset($_COOKIE[$auxEmail]))
        {
            echo '{"exito":"true","mensaje":"Se encontró la cookie: '.$_COOKIE[$auxEmail].'"}';
        }
        else
        {
            echo '{"exito":"false","mensaje":"No se encontró la cookie."}';
        }
                
    }


?>