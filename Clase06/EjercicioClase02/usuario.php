<?php

    require_once "AccesoDatos.php";

    class Usuario
    {
        public $id;
        public $correo;
        public $clave;
        public $nombre;
        public $apellido;
        public $perfil;

        public function MostrarDatos()
        {
            return "<br>ID: ".$this->id."<br>Correo: ".$this->correo."<br>Clave: ".$this->clave."<br>Nombre: ".$this->nombre."<br>Apellido: ".$this->apellido."<br>Perfil: ".$this->perfil;  
        }

        /*public function __construct($id, $correo, $clave, $nombre, $apellido, $perfil)
        {
            $this->id = $id;
            $this->correo = $correo;
            $this->clave = $clave;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->perfil = $perfil;
        }*/

        public static function TraerUno()
        {
            $obj = new stdClass();
            $obj->Exito = TRUE;
            $obj->Mensaje = "";
            $obj->Html = "";

            require_once "/clases/usuario.php";
      
            try {
                $usuario='root';
                $clave='';
                
                $db = new PDO('mysql:host=localhost;dbname=usuarios;charset=utf8', $usuario, $clave);
                $obj->Mensaje = "FETCHOBJECT";

                $sql = $db->query('SELECT id AS id, correo AS correo, clave AS clave, nombre AS nombre, apellido AS apellido, perfil AS perfil FROM usuario');

                $obj->Html = "";

                while ($fila = $sql->fetchObject("Usuario")) {//FETCHOBJECT -> RETORNA UN OBJETO DE UNA CALSE DADA
                    $obj->Html .= "**". $fila->MostrarDatos(). '**';
                }
        
            } catch (PDOException $e) {

                $obj->Exito = FALSE;
                $obj->Mensaje = "Error!!!\n" . $e->getMessage();
            }
        
            echo json_encode($obj);

            return $obj;
        }

        public static function TraerTodos()
        {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
            $consulta = $objetoAccesoDato->RetornarConsulta("SELECT id AS id, correo AS correo, clave AS clave, nombre AS nombre, apellido AS apellido, perfil AS perfil FROM usuario");        
            
            $consulta->execute();
            
            $consulta->setFetchMode(PDO::FETCH_INTO, new Usuario);                                                
    
            return $consulta;
        }

        public static function InsertarUsuario()
        {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
            $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO usuario (correo, clave, nombre, apellido, perfil)"
                                                    . "VALUES(:correo, :clave, :nombre, :apellido, :perfil)");
            $consulta->bindValue(':correo', $this->correo, PDO::PARAM_STR);
            $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
            $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
            $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
            $consulta->bindValue(':perfil', $this->perfil, PDO::PARAM_STR);

            $consulta->execute();   
        }

        public static function ModificarUsuario($id, $correo, $clave, $nombre, $apellido, $perfil)
        {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
            $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE usuario SET correo = :correo, clave = :clave, 
                                                        nombre = :nombre, apellido = :apellido, perfil = :perfil WHERE id = :id");
        
            $consulta->bindValue(':id', $id, PDO::PARAM_INT);
            $consulta->bindValue(':correo', $correo, PDO::PARAM_STR);
            $consulta->bindValue(':clave', $clave, PDO::PARAM_STR);
            $consulta->bindValue(':nombre', $nombre, PDO::PARAM_STR);
            $consulta->bindValue(':apellido', $apellido, PDO::PARAM_STR);
            $consulta->bindValue(':perfil', $perfil, PDO::PARAM_STR);

            return $consulta->execute();
        }

        public function EliminarUsuario($usuario)
        {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
            $consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM usuario WHERE id = :id");
        
            $consulta->bindValue(':id', $usuario->id, PDO::PARAM_INT);

            return $consulta->execute();
        }
    }

?>