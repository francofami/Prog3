<?php

    require_once "IParte1.php";
    require_once "AccesoDatos.php";
    require_once "IParte2.php";

    class Juguete implements IParte1, IParte2
    {
        private $tipo;
        private $precio;
        private $paisOrigen;
        private $pathImagen;

        public function __construct($tipo, $precio, $paisOrigen, $pathImagen = "")
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
        
            $consulta = $objetoAccesoDato->RetornarConsulta("SELECT tipo AS tipo, precio AS precio, pais AS paisOrigen, foto AS foto FROM juguetes");
            
            $consulta->execute();
            
            //$consulta->setFetchMode(PDO::FETCH_INTO, new Juguete('tipo','precio','pais','foto')); 
            
            $consulta->setFetchMode(PDO::FETCH_INTO, new stdClass(array ('tipo' => 'tipo', 'precio' => 'precio', 'paisOrigen' => 'paisOrigen', 'foto' => 'foto')));             
    
            return $consulta;
        }

	/*public static function TraerTodos()
    	{
        	$juguetes = array();

           	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
            	$consulta = $objetoAccesoDato->RetornarConsulta("SELECT tipo, precio, pais, foto FROM juguetes");
                  
            	$consulta->execute();

            	$consulta->setFetchMode(PDO::FETCH_ASSOC);  

            	while ($juguete = $consulta->fetch())
		{
                	if($juguete["foto"] != "")
                    	array_push($juguetes, new Juguete($juguete["tipo"],$juguete["precio"],$juguete["pais"],$juguete["foto"]));
                	else
                    	array_push($juguetes, new Juguete($juguete["tipo"],$juguete["precio"],$juguete["pais"]));
            	}	                                          

            return $juguetes;
    	}*/

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
                echo fgets($file)."<br>";
            }

            fclose($file);
        }

        public function Modificar()
        {
            $retorno = false; 

            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
            $consulta = $objetoAccesoDato->RetornarConsulta("UPDATE juguetes SET tipo = :tipo, precio=:precio, pais=:pais, foto=:foto WHERE tipo = :tipoAct AND pais = :paisAct");
            
            $consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
            $consulta->bindValue(':precio', $this->CalcularIVA(), PDO::PARAM_STR);
            $consulta->bindValue(':pais', $this->paisOrigen, PDO::PARAM_STR);
            $consulta->bindValue(':foto', $this->pathImagen, PDO::PARAM_STR);

            $consulta->bindValue(':tipoAct', $this->tipo, PDO::PARAM_STR);
            //$consulta->bindValue(':precioAct', $this->precio, PDO::PARAM_STR);
            $consulta->bindValue(':paisAct', $this->paisOrigen, PDO::PARAM_STR);
            //$consulta->bindValue(':fotoAct', $this->pathImagen, PDO::PARAM_STR);

            $consulta->execute();
            
            //$consulta->setFetchMode(PDO::FETCH_INTO, new Juguete('tipo','precio','pais','foto')); 
            
            $consulta->setFetchMode(PDO::FETCH_INTO, new stdClass(array ('tipo' => 'tipo', 'precio' => 'precio', 'pais' => 'pais', 'foto' => 'foto')));             
    
            if($consulta->rowCount() > 0) 
            {
                $retorno = true;
            }

            return $retorno;
        }

        public function Eliminar()
        {
            $retorno = false;

            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

            $consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM juguetes WHERE tipo = :tipoAct AND pais = :paisAct");

            $consulta->bindValue(':tipoAct', $this->tipo, PDO::PARAM_STR);
            $consulta->bindValue(':paisAct', $this->paisOrigen, PDO::PARAM_STR);     

            if($consulta->rowCount() > 0) 
            {
                $retorno = true;
            }

            return $retorno;
        }


    }

?>