<?php

require_once "baseDatos.php";

class Producto
{
    public $pNumero;
    public $pNombre;
    public $precio;
    public $tamaño;

    public function __construct($pNumero, $pNombre, $precio, $tamaño)
    {
        $this->pNumero = $pNumero;
        $this->pNombre = $pNombre;
        $this->precio = $precio;
        $this->tamaño = $tamaño;
    }

    public static function TraerTodos()
    {
            $retorno = [];

            $con = BaseDatos::EstablecerConexion();

            $sql = "SELECT * FROM productos";
        
            $rs = mysql_db_query(BaseDatos::$base, $sql, $con);

            while($row = mysql_fetch_array($rs))
            {
                $uno = new Producto($row[0],$row[1],$row[2],$row[3]);
                array_push($retorno, $uno);
                var_dump($row);
            }     
        
            BaseDatos::CerrarConexion();

            return $retorno;
    }

    public static function OrdenarAlfabeticamente($array)
    {
        $elArray = count($array);

        for($i=0;$i<$elArray-1;$i++)
        {
            for($j=$i+1;$j<$elArray;$j++)
            {
                if(strcmp($array[$i]->pNombre, $array[$j]->pNombre) == 1)
                {
                    $aux = $array[$i];
                    $array[$i] = $array[$j];
                    $array[$j] = $aux;
                }
            }
        }

        return $array;
    }

    

    public static function MostrarTodos($array)
    {
        $contArray = count($array);

        for($i=0; $i<$contArray; $i++)
        {
            echo "<br>Numero: ".$array[$i]->pNumero;
            echo "<br>Nombre: ".$array[$i]->pNombre;
            echo "<br>Precio: ".$array[$i]->precio;
            echo "<br>Tamaño: ".$array[$i]->tamaño;
        }
    }
}

?>