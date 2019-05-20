<?php

class Usuario
{
    private $_email;
    private $_clave;

    public function __construct($email, $clave)
    {
        $this->_email = $email;
        $this->_clave = $clave;
    }

    public function ToJSON()
    {
        return '{"_email":"'.$this->_email.'","_clave":"'.$this->_clave.'"}';
    }

    public function GuardarEnArchivo()
    {
        $retorno = "";

        $file = fopen("./archivos/usuarios.json", "a");

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
        $file = fopen("./archivos/usuarios.json", "r");

        $arrayUsuarios = array();

        while(!feof($file))
        {   
            $usuarioJSON = fgets($file);

            if($usuarioJSON == "")
            {
                continue;
            }
            
            $usuarioDecode = json_decode($usuarioJSON);

            $usuario = new Usuario($usuarioDecode->_email, $usuarioDecode->_clave);

            array_push($arrayUsuarios, $usuario);

        }

        fclose($file);

        return $arrayUsuarios;
    }

    public static function VerificarExistencia($usuario)
    {
        $retorno = false;
        $usuarios = Usuario::TraerTodos();
        

        foreach($usuarios as $usuarioAux)
        {
            if($usuarioAux->_email == $usuario->_email && $usuarioAux->_clave == $usuario->_clave)
            {
                $retorno = true;
                break;
            }
        }

        return $retorno;
    }

}
    


?>