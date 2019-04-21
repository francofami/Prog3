<?php

require_once "baseDatos.php";

class Proveedor
{
    public $numero;
    public $nombre;
    public $domicilio;
    public $localidad;

    public function __construct($numero, $nombre, $domicilio, $localidad)
    {
        $this->numero = $numero;
        $this->nombre = $nombre;
        $this->domicilio = $domicilio;
        $this->localidad = $localidad;
    }

    public static function TraerQuilmes()
    {
            $retorno = [];

            $con = BaseDatos::EstablecerConexion();

            $sql = "SELECT * FROM provedores WHERE localidad='Quilmes'";
        
            $rs = mysql_db_query(BaseDatos::$base, $sql, $con);

            while($row = mysql_fetch_array($rs))
            {
                $uno = new Proveedor($row[0],$row[1],$row[2],$row[3]);
                array_push($retorno, $uno);
                var_dump($row);
            }     
        
            BaseDatos::CerrarConexion();

            return $retorno;
    }

    public static function MostrarTodos($array)
    {
        $contArray = count($array);

        for($i=0; $i<$contArray; $i++)
        {
            echo "<br>Numero: ".$array[$i]->numero;
            echo "<br>Nombre: ".$array[$i]->nombre;
            echo "<br>Domicilio: ".$array[$i]->domicilio;
            echo "<br>Localidad: ".$array[$i]->localidad;
        }
    }
}

?>