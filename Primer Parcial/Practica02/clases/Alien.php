<?php

class Alien
{
    private $_planeta;
    private $_email;
    private $_clave;

    public function __construct($planeta, $email, $clave)
    {
        $this->_planeta = $planeta;
        $this->_email = $email;
        $this->_clave = $clave;
    }

    public function getPlaneta()
    {
        return $this->_planeta;
    }

    public function ToJSON()
    {
        return '{"_planeta":"'.$this->_planeta.'","_email":"'.$this->_email.'","_clave":"'.$this->_clave.'"}';
    }

    public function GuardarEnArchivo()
    {
        $retorno = "";

        $file = fopen("./archivos/alien.json", "a");

        if(fwrite($file, $this->ToJSON()."\r\n") == true)
        {
            $retorno = '{"exito":"true","mensaje":"Se pudo guardar en archivo"}';
        }
        else
        {
            $retorno = '{"exito":"false","mensaje":"No se pudo guardar en archivo"}';
        }

        fclose($file);

        return $retorno;
    }

    public static function TraerTodos()
    {
        $file = fopen("./archivos/alien.json", "r");

        $arrayAliens = array();

        while(!feof($file))
        {   
            $alienJSON = fgets($file);

            if($alienJSON == "")
            {
                continue;
            }

            
            $alien = json_decode($alienJSON);

            array_push($arrayAliens, $alien);

        }

        fclose($file);

        return $arrayAliens;
    }

    public static function VerificarExistencia($alien)
    {
        $aliens = Alien::TraerTodos();
        $contador = 0;
        $arrayPlanetas = array();
        $i = 0;

        foreach($aliens as $alienAux)
        {
            if($alienAux->_email == $alien->_email && $alienAux->_clave == $alien->_clave)
            {
                $contador += 1;
            }

            //Array que contiene planetas
            array_push($arrayPlanetas, $alienAux->_planeta);
        }

        //Cuenta cuantas veces se repiten los planetas
        $arrayPlanetas = array_count_values($arrayPlanetas);
        //Ordena de mayor a menor los planetas segun cantidad de apariciones
        arsort($arrayPlanetas);

        if($contador == 0)
        {
            $retorno = '{"existe":"false","mensaje":"El alien no está registrado. Los planetas mas populares son:';

            foreach($arrayPlanetas as $clave=>$valor)
            {
                $i+=1;

                $retorno .= ' '.$clave.'('.$valor.')';

                if($i == 3)
                {
                    break;
                }
            }

            $retorno .= '"}';

        }
        else
        {
            $retorno = '{"existe":"true","mensaje":"El alien está registrado. Hay '.$contadorPlaneta.' aliens registrados en el mismo planeta"}';
        }

        return $retorno;
    }

}
    


?>