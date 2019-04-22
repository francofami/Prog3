<?php
 class cd{

public $correo;
public $clave;
public $nombre;
public $apellido;
public $perfil;

public function MostrarDatos()
{
    return "<br>Correo: ".$correo."<br>Clave: ".$clave."<br>Nombre: ".$nombre."<br>Apellido: ".$apellido."<br>Perfil: ".$perfil;  
}

 }

?>