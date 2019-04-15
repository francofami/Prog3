<?php

require_once "baseDatos.php";

    class Usuario
    {
        public $id;
        public $correo;
        public $clave;
        public $nombre;
        public $apellido;
        public $perfil;

        public function __construct($id, $correo, $clave, $nombre, $apellido, $perfil)
        {
            $this->id = $id;
            $this->correo = $correo;
            $this->clave = $clave;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->perfil = $perfil;
        }

        public static function Traer($id)
        {
            $retorno = null;

            $sql = BaseDatos::EstablecerConexion();

            $sql = "SELECT * FROM usuario WHERE id=$id";
        
            $rs = mysql_db_query(BaseDatos::$base, $sql);

            $row = mysql_fetch_array($rs);
            
            var_dump($row);
            
            $retorno = new Usuario($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);
        
            BaseDatos::CerrarConexion();

            return $retorno;
        }

        public static function TraerTodos()
        {
            $retorno = null;

            $sql = BaseDatos::EstablecerConexion();

            $sql = "SELECT * FROM usuario";
        
            $rs = mysql_db_query(BaseDatos::$base, $sql);

            while($row = mysql_fetch_array($rs))
            {
                $uno = new Usuario($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);
                array_push($retorno, $uno);
                var_dump($row);
            }     
        
            BaseDatos::CerrarConexion();

            return $retorno;
        }
    }

    

?>