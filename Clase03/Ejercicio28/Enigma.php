<?php

    class Enigma
    {
        public static function EncriptarMensaje($mensaje, $path)
        {
            $archivo = fopen($path, "w");

            $arrayMensaje = str_split($mensaje);

            for($i=0;$i<sizeof($arrayMensaje);$i++)
            {
                $numAscii = ord($arrayMensaje[$i]) + 200;
                $arrayMensaje[$i] = chr($numAscii);
                fwrite($archivo, $arrayMensaje[$i]);
            }   
            
            fclose($archivo);
        }

        public static function DesencriptarMensaje($path)
        {   
            $archivo = fopen($path, "r");

            while(!feof($archivo))
            {
                $i = 0;

                $mensaje = fgets($archivo);     
                
                $arrayMensaje = str_split($mensaje);
            
                for($i=0;$i<sizeof($arrayMensaje);$i++)
                {
                    $numAscii = ord($arrayMensaje[$i]) - 200;
                    $arrayMensaje[$i] = chr($numAscii);
                    
                    echo $arrayMensaje[$i];       
                }          
            }                       

            fclose($archivo);
        }
    }

?>