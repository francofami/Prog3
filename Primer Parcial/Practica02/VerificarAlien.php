<?php

    session_start();
    require_once "./clases/Alien.php";

    $email = $_POST["email"];
    $clave = $_POST["clave"];
    $planeta = $_POST["planeta"];

    $alien = new Alien($email, $clave, $planeta);

    $existe = json_decode(Alien::VerificarExistencia($alien));

    $cookieNombre = $_POST["email"] . "_" . $alien->getPlaneta();
    $cookieValor = date("H:i:s") . $existe->mensaje; 

    if($existe->existe == true)
    {
        setcookie($cookieNombre, $cookieValor, time() + (86400 * 30), "/");
        header('Location: ListadoAliens.php');
    }
    else
    {
        $resp = new stdClass();
        $resp->exito = false;
        $resp->mensaje = "No se encontro al alien";
        echo json_encode($resp);
    }    

?>