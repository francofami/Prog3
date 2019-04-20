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

        public static function TraerUno($id)
        {
            $retorno = null;

            $con = BaseDatos::EstablecerConexion();

            $sql = "SELECT * FROM usuario WHERE id=$id";
        
            $rs = mysql_db_query(BaseDatos::$base, $sql, $con);

            $row = mysql_fetch_array($rs);
            //$row = mysql_fetch_object($rs);
            
            var_dump($row);
            
            $retorno = new Usuario($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);
        
            BaseDatos::CerrarConexion();

            return $retorno;
        }

        public static function TraerTodos()
        {
            $retorno = null;

            $con = BaseDatos::EstablecerConexion();

            $sql = "SELECT * FROM usuario";
        
            $rs = mysql_db_query(BaseDatos::$base, $sql, $con);

            while($row = mysql_fetch_array($rs))
            {
                $uno = new Usuario($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);
                array_push($retorno, $uno);
                var_dump($row);
            }     
        
            BaseDatos::CerrarConexion();

            return $retorno;
        }

        public function Eliminar()
        {
            $retorno = false;

            $con = BaseDatos::EstablecerConexion();

            $sql = "DELETE FROM usuario WHERE id=$this->id";

            mysql_db_query(BaseDatos::$base, $sql, $con);

            $retorno = true; //Fijarme que puedo usar para checkear si salio bien o no

            return $retorno;
        }

        public static function Agregar($obj)
        {
            $retorno = false;
            
            $con = BaseDatos::EstablecerConexion();
        
            $sql = "INSERT INTO usuario (correo, clave, nombre, apellido, perfil)
                    VALUES('$obj->correo', '$obj->clave', '$obj->nombre', '$obj->apellido', '$obj->perfil')";

            mysql_db_query(BaseDatos::$base, $sql, $con);

            $retorno = true;

            BaseDatos::CerrarConexion();

            return $retorno;        
        }

        public static function Modificar($obj)
        {
            $retorno = false;

            $con = BaseDatos::EstablecerConexion();
        
            $sql = "UPDATE usuario SET correo='$obj->correo', clave='$obj->clave', nombre='$obj->nombre', apellido = '$obj->apellido', perfil = '$obj->perfil'
                WHERE id=$obj->id";

            mysql_db_query(BaseDatos::$base, $sql, $con);

            return $retorno;
        }
    }

    

?>