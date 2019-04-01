<?php 
require_once "EjercicioClase.php";  

/*$persona = new Persona();

$persona->nombre = "Franco";
$persona->apellido = "Famiglietti";

$persona->Guardar();
$persona->Leer();*/

//echo var_dump(Persona::TraerTodasLasPersonas()); //Es estatico entonces no tengo que crear un objeto

foreach(Persona::TraerTodasLasPersonas() as $per)
{
    echo $per->ToString();
    echo "<br>";
}

?>