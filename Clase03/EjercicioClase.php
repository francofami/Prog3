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

}

?>