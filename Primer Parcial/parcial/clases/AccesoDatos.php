<?php

class AccesoDatos
{  
    private static $_objetoAccesoDatos;
    private $_objetoPDO;
 
    private function __construct()
    {
        try {
 
            $usuario='root';
            $clave='';

            $this->_objetoPDO = new PDO('mysql:host=localhost;dbname=juguetes_bd;charset=utf8', $usuario, $clave);
 
        } catch (PDOException $e) {
 
            echo "Error.<br/>" . $e->getMessage();
 
            die();
        }
    }
 
    public function RetornarConsulta($sql)
    {
        return $this->_objetoPDO->prepare($sql);
    }
 
    public static function DameUnObjetoAcceso()//singleton
    {
        if (!isset(self::$_objetoAccesoDatos)) {       
            self::$_objetoAccesoDatos = new AccesoDatos(); 
        }
 
        return self::$_objetoAccesoDatos;        
    }
 
    public function __clone()
    {
        trigger_error('No se puede clonar el objeto.', E_USER_ERROR);
    }
}

?>