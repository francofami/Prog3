<?php

require_once "EjercicioClase.php";

/*echo "GET: ";
echo var_dump($_GET)."<br>";
echo "POST: ";
echo var_dump($_POST)."<br>";
echo "REQUEST: ";
echo var_dump($_REQUEST)."<br>";
die();*/ 

$persona = new Persona();
$persona->nombre = $_REQUEST["nombre"];
$persona->apellido = $_REQUEST["apellido"];
if(!($persona->Guardar()))
{
    echo "Se guardo la persona correctamente.";
}

?>