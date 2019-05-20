<?php

require_once "IParte2.php";
    require_once "AccesoDatos.php";

    class Televisor implements IParte2
    {
        private $tipo;
        private $precio;
        private $paisOrigen;
        private $path;

        public function __construct($tipo, $precio, $paisOrigen, $pathImagen = "")
        {
            $this->tipo = $tipo;
            $this->paisOrigen = $paisOrigen;
            $this->precio = $precio;
            $this->path = $pathImagen;
        }

        public function ToJSON()
        {
            return '{"tipo":"'.$this->tipo.'","precio":'.$this->precio.',"paisOrigen":"'.$this->paisOrigen.'","path":"'.$this->path.'"}';
        }

        public function Agregar()
        {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO televisores (tipo, precio, pais, foto)"       
            . "VALUES(:tipo, :precio, :paisOrigen, :path)");
            $consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
            $consulta->bindValue(':precio', $this->CalcularIVA(), PDO::PARAM_STR);
            $consulta->bindValue(':paisOrigen', $this->paisOrigen, PDO::PARAM_STR);
            $consulta->bindValue(':path', $this->path, PDO::PARAM_STR);

            return $consulta->execute();
        }

        public static function Traer()
        {
            $televisores = array();

           	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
            	$consulta = $objetoAccesoDato->RetornarConsulta("SELECT tipo, precio, pais, foto FROM televisores");
                  
            	$consulta->execute();

            	$consulta->setFetchMode(PDO::FETCH_ASSOC);  

            	while ($televisor = $consulta->fetch())
		        {
                	if($televisor["foto"] != "")
                    	array_push($televisores, new Televisor($televisor["tipo"],$televisor["precio"],$televisor["pais"],$televisor["foto"]));
                	else
                    	array_push($televisores, new Televisor($televisor["tipo"],$televisor["precio"],$televisor["pais"]));
            	}	                                          

            return $televisores;
        }

        public function CalcularIVA()
        {
            return $this->precio * 1.21;
        }

        public function Modificar()
        {
            $retorno = false; 
            
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
            $consulta = $objetoAccesoDato->RetornarConsulta("UPDATE ovnis SET tipo = :tipo, precio=:precio, pais=:pais, foto=:foto WHERE tipo = :tipo AND pais = :pais");
            
            $consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
            $consulta->bindValue(':precio', $this->precio, PDO::PARAM_STR);
            $consulta->bindValue(':pais', $this->paisOrigen, PDO::PARAM_STR);
            $consulta->bindValue(':foto', $this->path, PDO::PARAM_STR);

            $consulta->execute();
            
            //$consulta->setFetchMode(PDO::FETCH_INTO, new Juguete('tipo','precio','pais','foto')); 
            
            $consulta->setFetchMode(PDO::FETCH_INTO, new stdClass(array ('tipo' => 'tipo', 'velocidad' => 'velocidad', 'planeta' => 'planeta', 'foto' => 'foto')));             

            if($consulta->rowCount() > 0) 
            {
                $retorno = true;
            }

            return $retorno;
        }
    }

?>