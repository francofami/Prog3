<?php

class Usuario
{
    private $nombre;
    private $apellido;
    private $division;

    public function __construct($nombre, $apellido, $division)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->division = $division;
    }

    public static function Verificar($usuario)
    {
        $retorno = FALSE;

        $arrayUsuarios = self::TraerTodos();

        foreach($arrayUsuarios as $usuarioEnArray)
        {
            if($usuario->nombre == $usuarioEnArray->nombre && $usuario->apellido == $usuarioEnArray->apellido && $usuario->division == $usuarioEnArray->division)
            {
                $retorno = TRUE;
                break;
            }
        }

        return $retorno;
    }

    private static function TraerTodos()
    {
        return array(
            new Usuario("A","A","A"), new Usuario("B","B","B"), new Usuario("C","C","C"), new Usuario("D","D","D")
        );
    }
}