<?php 
require_once "EjercicioClase.php";  

$persona = new Persona();

$persona->nombre = "Franco";
$persona->apellido = "Famiglietti";

$persona->Guardar();
$persona->Leer();

?>