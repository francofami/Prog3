<?php

class BaseDatos
{
        public static $base="usuarios";
        private static $host = "localhost";
        private static $user= "root";
        private static $clave= "";

    public static function EstablecerConexion()
    {
        $con = @mysql_connect(BaseDatos::$host, BaseDatos::$user, BaseDatos::$clave);         
        return $con;
    }

    public static function CerrarConexion()
    {
        mysql_close();
    }
}

?>