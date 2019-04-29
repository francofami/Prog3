<?php

    require_once "IParte1.php";
    require_once "AccesoDatos.php";

    class Juguete implements IParte1
    {
        private $tipo;
        private $precio;
        private $paisOrigen;
        private $pathImagen;

        public static function Tipo($juguete)
        {
            return $juguete->tipo;
        }

        public function Precio()
        {
            return $this->precio;
        }

        public function PaisOrigen()
        {
            return $this->paisOrigen;
        }

        public function PathImagen()
        {
            return $this->pathImagen;
        }

        public function __construct($tipo, $precio, $paisOrigen, $pathImagen)
        {
            $this->tipo = $tipo;
            $this->paisOrigen = $paisOrigen;
            $this->precio = $precio;
            $this->pathImagen = $pathImagen;
        }

        public function ToString()
        {
            return $this->tipo." - ".$this->precio." - ".$this->paisOrigen." - ".$this->pathImagen."\r\n";
        }

        public function Agregar()
        {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO juguetes (tipo, precio, pais, foto)"       
            . "VALUES(:tipo, :precio, :pais, :foto)");
            $consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
            $consulta->bindValue(':precio', $this->CalcularIVA(), PDO::PARAM_STR);
            $consulta->bindValue(':pais', $this->paisOrigen, PDO::PARAM_STR);
            $consulta->bindValue(':foto', $this->pathImagen, PDO::PARAM_STR);

            return $consulta->execute();
        }

        public static function Traer()
        {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
            $consulta = $objetoAccesoDato->RetornarConsulta("SELECT tipo AS tipo, precio AS precio, pais AS pais, foto AS foto FROM juguetes");
            
            $consulta->execute();
            
            $consulta->setFetchMode(PDO::FETCH_INTO, new Juguete('tipo','precio','pais','foto')); 
            
            
    
            return $consulta;
        }

        function CalcularIVA()
        {
            return $this->precio + ($this->precio * 0.21);
        }

        public function Verificar($juguetes)
        {
            $retorno = TRUE;

            foreach($juguetes as $juguete)
            {
                if(strcmp($this->tipo, $juguete->tipo) == 0 && strcmp($this->paisOrigen, $juguete->paisOrigen) == 0)
                {
                    $retorno = FALSE;
                    break;
                }
            }

            return $retorno;
        }

        public static function MostrarLog()
        {
            $file = fopen("./archivos/juguetes_sin_foto.txt", "r");

            while(!feof($file))
            {
                echo fgets($file);
            }

            fclose($file);
        }


    }

?>