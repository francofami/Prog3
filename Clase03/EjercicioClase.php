<?php

class Persona
{
    public $nombre;
    public $apellido;

    public function Guardar()
    {
        $retorno = FALSE;

        $archivo = fopen("Ejercicio01Clase.txt", "a");

        if(!fwrite($archivo, $this->ToString()))
        {
            $retorno = TRUE;
            echo "Se pudo leer el archivo";
        }

        fclose($archivo);

        return $retorno;
    }
    

    public function Leer()
    {
        $retorno = FALSE;

        $archivo = fopen("Ejercicio01Clase.txt", "r");

        while(!feof($archivo))
        {
            echo fgets($archivo)."<br>";
            $retono = TRUE;
        }

        fclose($archivo);

        return $retorno;
    }

    public function ToString()
    {
        $retorno = "";

        $retorno = $this->nombre." - ".$this->apellido."\r\n";

        return $retorno;
    }

    public static function TraerTodasLasPersonas()
    {
        $i = 0;
        $retorno = array();

        $archivo = fopen("Ejercicio01Clase.txt", "r");

        while(!feof($archivo))
        {
            $nombreApellido = fgets($archivo);

            if($nombreApellido == "")
            {
                continue; //Si hay una linea vacia que itere 
            }
            
            //A partir de un string le paso un carater de separacion ('-' en este caso) me devuelve un array con [0]=nombre [1]=apellido\r\n

            $separado = array();
            $separado = explode(" - ", $nombreApellido);
            
            $personaNueva = new Persona();

            $personaNueva->nombre = $separado[0];
            $personaNueva->apellido = $separado[1];

            $retorno[$i] = $personaNueva;
            
            $i += 1;
        }

        return $retorno;
    }

}

?>