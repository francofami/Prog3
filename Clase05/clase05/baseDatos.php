<?php

class BaseDatos
{
    public static $base;
    private static $user;
    private static $clave;

    $base = "localhost";
    $user = "root";
    $clave = "";

    public static function EstablecerConexion()
    {
        return @mysql_connect($base, $user, $clave);          
    }

    public static function CerrarConexion()
    {
        mysql_close();
    }
}

?>