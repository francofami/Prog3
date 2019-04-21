<?php

require_once "baseDatos.php";

class Envio
{
    public $numero;
    public $pNumero;
    public $cantidad;

    public function __construct($numero, $pNumero, $cantidad)
    {
        $this->numero = $numero;
        $this->pNumero = $pNumero;
        $this->cantidad = $cantidad;
    }

    public static function TraerEntre200y300()
    {
            $retorno = [];

            $con = BaseDatos::EstablecerConexion();

            $sql = "SELECT * FROM envios WHERE cantidad>=200 && cantidad<=300";
        
            $rs = mysql_db_query(BaseDatos::$base, $sql, $con);

            while($row = mysql_fetch_array($rs))
            {
                $uno = new Envio($row[0],$row[1],$row[2]);
                array_push($retorno, $uno);
                var_dump($row);
            }     
        
            BaseDatos::CerrarConexion();

            return $retorno;
    }

    public static function TraerTodos()
    {
            $retorno = [];

            $con = BaseDatos::EstablecerConexion();

            $sql = "SELECT * FROM envios";
        
            $rs = mysql_db_query(BaseDatos::$base, $sql, $con);

            while($row = mysql_fetch_array($rs))
            {
                $uno = new Envio($row[0],$row[1],$row[2]);
                array_push($retorno, $uno);
                var_dump($row);
            }     
        
            BaseDatos::CerrarConexion();

            return $retorno;
    }

    public static function CantidadTotal()
    {
        $array = Envio::TraerTodos();
        $largoArray = count($array);
        $retorno = 0;

        for($i=0;$i<=$largoArray;$i++)
        {
            $retorno += $array[$i]->cantidad;
        }
        
        return $retorno;
    }

    public static function MostrarTodos($array)
    {
        $contArray = count($array);

        for($i=0; $i<$contArray; $i++)
        {
            echo "<br>Numero: ".$array[$i]->numero;
            echo "<br>pNumero: ".$array[$i]->pNumero;
            echo "<br>Cantidad: ".$array[$i]->cantidad;
        }
    }
}

?>