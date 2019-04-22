<?php

require_once "usuario.php";

$queHago = isset($_POST['queHago']) ? $_POST['queHago'] : NULL;

$host = "localhost";
$user = "root";
$pass = "";
$base = "usuarios";

switch($queHago){
    case "traerUnUsuario":

        //$id = isset($_POST['id']) ? $_POST['id'] : NULL;
        //$usuario = new Usuario;
        $usuario = Usuario::TraerUno();

        break;
    
    case "traerTodos":

    $usuarios = Usuario::TraerTodos();
        
    foreach ($usuarios as $usuario) {
        
        print_r($usuario->MostrarDatos());
        print("
                ");
    }

        break;

    break;

    case "crearUsuario":
        $usuario = new Usuario();
        $usuario->id = 66;
        $usuario->correo = "ccgvfgd@fgfgfdsg.com";
        $usuario->clave = "2018";
        $usuario->nombre = "AAA";
        $usuario->apellido = "BBB";
        $usuario->perfil = "CCC";
    
        $usuario->InsertarUsuario();

        echo "ok";   
        break;

    case "modificarUsuario":
        $id = $_POST['id'];        
        $correo = $_POST['correo'];
        $clave = $_POST['clave'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $perfil = $_POST['perfil'];
    
        echo Usuario::ModificarUsuario($id, $correo, $clave, $nombre, $apellido, $perfil);
            
        break;

    case "eliminarUsuario":
        $usuario = new Usuario();
        $usuario->id = 1;
    
        $usuario->EliminarCD($usuario);

        echo "ok";
    
        break;
        

    default:
        echo ":(";

}