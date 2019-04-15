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

        public function Traer($id)
        {
            $retorno = null;

            $sql = baseDatos::EstablecerConexion();

            $sql = "SELECT * FROM usuario WHERE id=$id";
        
            $rs = mysql_db_query($base, $sql);

            while($row = mysql_fetch_object($rs))
            {
                var_dump($row);
            }

            //$retorno.$id = $id;
            //$retorno.$correo = ;
        
            baseDatos::CerrarConexion();

            return $retorno;
        }
    }

    

?>