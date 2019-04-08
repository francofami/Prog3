<?php

    class Empleado
    {
        public $apellido;
        public $nombre;
        public $legajo;
        public $dni;
        public $sueldo;
        public $path_foto;

        public function __construct($legajo, $apellido, $nombre, $dni, $sueldo, $path_foto)
        {
            $this->apellido = $apellido;
            $this->nombre = $nombre;
            $this->dni = $dni;
            $this->legajo = $legajo;
            $this->sueldo = $sueldo;
            $this->path_foto = $path_foto;
        }

        public function ToString()
        {
            return $this->legajo." - ".$this->apellido." - ".$this->nombre." - ".$this->dni." - ".$this->sueldo." - ".$this->path_foto;
        }

        public static function Agregar($empleado)
        {
            $archivo = fopen("empleados.txt", "a");
    
            fwrite($archivo, $empleado->ToString()."\r\n");

            fclose($archivo);
        }

        public static function TraerTodos()
        {
            $retorno = array();
            $archivo = fopen("empleados.txt", "r");
            while(!feof($archivo))
            {
                $empleado = fgets($archivo);
                if($empleado == "")
                {
                    continue; //Si hay una linea vacia que itere 
                }
                
                //A partir de un string le paso un carater de separacion ('-' en este caso) me devuelve un array con [0]=nombre [1]=apellido\r\n
                $separado = array();
                $separado = explode(" - ", $empleado);

                $empleadoNuevo = new Empleado($separado[0], $separado[1], $separado[2], $separado[3], $separado[4], $separado[5]);

                array_push($retorno, $empleadoNuevo);
            }
            return $retorno;
        }
      
    }

?>