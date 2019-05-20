<?php

    require_once "./IParte2.php";  
    require_once "./AccesoDatos.php";
    require_once "./IParte3.php";

    class Ovni implements IParte2, IParte3
    {
        public $tipo;
        public $velocidad;
        public $planetaOrigen;
        public $pathFoto;

        public function __construct($tipo="", $velocidad=0, $planetaOrigen="", $pathFoto="")
        {
            $this->tipo = $tipo;
            $this->velocidad = $velocidad;
            $this->planetaOrigen = $planetaOrigen;
            $this->pathFoto = $pathFoto;
        }

        public function ToJSON()
        {
            return '{"tipo":"'.$this->tipo.'","velocidad":'.$this->velocidad.',"planetaOrigen":"'.$this->planetaOrigen.'","pathFoto":'.$this->pathFoto.'}';
        }

        public function Agregar()
        {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO ovnis (tipo, velocidad, planetaOrigen, pathFoto)"       
            . "VALUES(:tipo, :precio, :pais, :foto)");
            $consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
            $consulta->bindValue(':velocidad', $this->CalcularIVA(), PDO::PARAM_STR);
            $consulta->bindValue(':planetaOrigen', $this->paisOrigen, PDO::PARAM_STR);
            $consulta->bindValue(':pathFoto', $this->pathImagen, PDO::PARAM_STR);

            return $consulta->execute();
        }

        public static function Traer()
        {
            $ovnis = array();

           	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
            	$consulta = $objetoAccesoDato->RetornarConsulta("SELECT tipo, velocidad, planetaOrigen, pathFoto FROM ovnis");
                  
            	$consulta->execute();

            	$consulta->setFetchMode(PDO::FETCH_ASSOC);  

            	while ($juguete = $consulta->fetch())
		        {
                	if($juguete["pathFoto"] != "")
                    	array_push($ovnis, new Ovni($ovni["tipo"],$ovni["velocidad"],$ovni["planetaOrigen"],$ovni["pathFoto"]));
                	else
                    	array_push($ovnis, new Ovni($ovni["tipo"],$ovni["velocidad"],$ovni["planetaOrigen"]));
            	}	                                          

            return $ovnis;
        }

        public function ActivarVelocidadWarp($ovni)
        {
            return $ovni->velocidad * 10.45;
        }

        public function Existe($ovnis)
        {
            $flag = 0;

            foreach($ovnis as $ovni)
            {
                if($ovni->tipo == $this->tipo && $ovni->planetaOrigen == $this->planetaOrigen)
                {
                    $flag = 1;
                    break;
                }
            }
        }

        public function Modificar()
        {
            $retorno = false; 
            
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
            $consulta = $objetoAccesoDato->RetornarConsulta("UPDATE ovnis SET tipo = :tipo, velocidad=:velocidad, planeta=:planeta, foto=:foto WHERE tipo = :tipo AND planeta = :planeta");
            
            $consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
            $consulta->bindValue(':velocidad', $this->velocidad, PDO::PARAM_STR);
            $consulta->bindValue(':planeta', $this->planetaOrigen, PDO::PARAM_STR);
            $consulta->bindValue(':foto', $this->pathFoto, PDO::PARAM_STR);

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