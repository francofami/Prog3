<?php

    class Cliente
    {
        public $nombre;
        public $correo;
        public $clave;

        function __construct($nombre, $correo, $clave)
        {
            $this->nombre = $nombre;
            $this->correo = $correo;
            $this->clave = $clave;
        }

        function ToString()
        {
            return $this->nombre." - ".$this->correo." - ".$this->clave."\r\n";
        }

        static function GuardarEnArchivo($cliente)
        {
            $file = fopen("./clientes/clientesActuales.txt", "a+");

            fwrite($file, $cliente->ToString());

            fclose($file);
        }

        static function Validar($correo, $clave)
        {
            $retorno = "Cliente inexistente";

            $file = fopen("./clientes/clientesActuales.txt", "r");

            while(!feof($file))
            {
                $usuario = fgets($file);

                if($usuario == "")
                {
                    continue;
                }

                $separado = array();
                $separado = explode(" - ", $usuario);

                if($separado[1]==$correo && $separado[2]==$clave."\r\n")
                {
                    $retorno = "Cliente logueado: ".$separado[0];
                    break;
                }
            }

            fclose($file);

            return $retorno;
        }
    }

?>