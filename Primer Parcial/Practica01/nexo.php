<?php

require_once "cliente.php";
require_once "helado.php";

$queHagoPost = isset($_POST['queHago']) ? $_POST['queHago'] : NULL;
$queHagoGet = isset($_GET['queHago']) ? $_GET['queHago'] : NULL;

$host = "localhost";
$user = "root";
$pass = "";
$base = "usuarios";

if($queHagoPost != NULL)
{
    switch($queHagoPost)
    {
        case "cargarCliente":
        {   
           $cliente = new Cliente($_POST["nombre"],$_POST["correo"],$_POST["clave"]);
          Cliente::GuardarEnArchivo($cliente);
        }
        break;

        case "validar":
        {   
            echo Cliente::Validar($_POST["correo"],$_POST["clave"]);
        }
        break;

        case "cargarHelado":
        {
            $helado = new Helado($_POST["sabor"], $_POST["precio"], $_FILES["foto"]);
            Helado::GuardarEnArchivo($helado);
        }
        break;  

        case "borrarHelado":
        {
            Helado::BorrarHelado($_POST["sabor"]);
        }
        break;

        case "modificarHelado":
        {
            $helado = new Helado($_POST["sabor"], $_POST["precio"], $_FILES["foto"]);
            Helado::ModificarHelado($helado);
        }
        break;
    }
} else if($queHagoGet != NULL)
    {
        switch($queHagoGet)
        {
            case "vender":
            {
                echo Helado::Vender($_GET["sabor"], $_GET["cantidad"]);
            }
            break;

            case "listadoHelados":
            {
                echo Helado::ListadoHelados();
            }
            break;

            case "borrarHelados":
            {
                if(Helado::Validar($_GET["sabor"])==-1)
                {
                    echo "El helado no está disponible.";
                }
                else
                {
                    echo "El helado está disponible.";
                }
            }
            break;
        }
        
    }
?>