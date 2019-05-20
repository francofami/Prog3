<?php
    require_once "./clases/Usuario.php";

    $email = $_POST["email"];
    $clave = $_POST["clave"];

    $usuario = new Usuario($email, $clave);

    if(Usuario::VerificarExistencia($usuario) == true)
    {
        $cookieNombre = $email;
        $cookieValor = date("H:i:s"); 
        setcookie($cookieNombre, $cookieValor, time()+100);
        header('Location: ListadoUsuarios.php');
    }
    else
    {
        $resp = new stdClass();
        $resp->exito = false;
        $resp->mensaje = "No se encontro el usuario.";
        echo json_encode($resp);
    }

?>