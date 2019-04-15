<?php

class BaseDatos
{
        public static $base="localhost";
        private static $user= "root";
        private static $clave= "";

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