<?php

    class Helado implements Ivendible
    {
        private $sabor;
        private $precio;
        private $foto;

        function __construct($sabor, $precio, $foto)
        {
            $this->sabor = $sabor;
            $this->precio = $precio;
            $this->foto = $foto;
        }

        function ToString()
        {            
            return $this->sabor." - ".$this->precio;
        }

        static function GuardarEnArchivo($helado)
        {
            //$explode = explode(".",$_FILES["foto"]["name"]); //Le quito la extension (.jpg) a la imagen
            $nombreFinal = $helado->sabor.".".date("his").".".pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION); //Le agrego la hora (h) minutos (i) segundos (s), le concateno un . y luego el jpg

            $file = fopen("./helados/sabores.txt", "a+");

            fwrite($file, $helado->ToString()." - ".$nombreFinal."\r\n");

            fclose($file);

            self::GuardarFoto($nombreFinal);
        }

        static function GuardarFoto($path)
        {
            $destino = "helados\\heladosImagen\\".$path;
            move_uploaded_file($_FILES["foto"]["tmp_name"], $destino);
        }

        static function Vender($sabor, $cantidad)
        {
            $retorno = "El sabor no se encuentra!!!";

            $precio = self::Validar($sabor);

            if($precio>0)
            {
                self::GuardarEnArchivoVendidos($sabor, $cantidad, $precio);

                $helado = new Helado($sabor, $precio, "");

                $retorno = (string)($helado->PrecioMasIva() * $cantidad);
            }

            return $retorno;
        }

        static function GuardarEnArchivoVendidos($sabor, $cantidad, $precio)
        {
            $file = fopen("./helados/vendidos.txt", "a+");

            fwrite($file, $sabor." - ".$cantidad." - ".$precio."\r\n");

            fclose($file);
        }

        static function Validar($sabor)
        {
            $retorno = -1;

            $file = fopen("./helados/sabores.txt", "r");

            while(!feof($file))
            {
                $helado = fgets($file);

                if($sabor == "")
                {
                    continue;
                }

                $explode = array();
                $explode = explode(" - ", $helado);

                if(strcmp($explode[0], $sabor) == 0)
                {
                    $retorno = (int)$explode[1];
                    break;
                }
            }

            fclose($file);

            return $retorno;
        }

        function PrecioMasIva()
        {
            return $this->precio + ($this->precio * 0.21);
        }

        static function ListadoHelados()
        {
            $file = fopen("./helados/sabores.txt", "r");
            
            $tabla = "<table><tr><th>Sabor</th><th>Precio</th><th>Foto</th></tr>";

            while(!feof($file))
            {
                $explode = explode(" - ", fgets($file));

                if(count($explode) == 3)
                {
                    $helado = new Helado($explode[0],$explode[1],$explode[2]);
                    $tabla .= "<tr><td>$helado->sabor</td><td>$helado->precio</td><td><img src='localhost/pp/heladosImagen/$helado->foto'/></td></tr>";
                }
            } 

            fclose($file);

            return $tabla .= "</table>";
        }

        static function BorrarHelado($sabor)
        {
            $file = fopen("./helados/sabores.txt", "r");

            while(!feof($file))
            {
                $fgets = fgets($file);
                $explode = explode(" - ", $fgets);

                if(strcmp($explode[0],$sabor)==0)
                {
                    self::BorrarFoto($explode[2]);
                    
                    //file_put_contents("./helados/sabores.txt", ""); 

                    //$helado = new Helado($explode[0],$explode[1],$explode[2]);
                    //break;

                    
                    //antepongo ; al dato a borrar por que asi queda mas adelante
                    $borrar=$fgets;
                    //leo el archivo a un array, transformo el array en
                    //una cadena separada por ; (aca lo cambie por "" para omitir el segundo str rplace)
                    $cadena=join("",file("./helados/sabores.txt"));
                    //reemplazo lo que voy a borrar en la cadena por nada
                    $cadena=str_replace($borrar,"",$cadena);
                    //reeemplazo los ; por saltos de línea
                    //$cadena=str_replace(";","\r\n",$cadena);
                    //escribo la cadena resultante al archivo
                    file_put_contents("./helados/sabores.txt",$cadena);
                    break;
                }
            }

            fclose($file);
        }

        static function BorrarFoto($path)
        {
            $explode = explode(".", $path);
            $newPath = $explode[0]."."."borrado".".".date("his").".".$explode[2];

            $origen = "helados\\heladosImagen\\".$path;
            $destino = "helados\\heladosBorrados\\".$newPath;

            rename(trim($origen), trim($destino)); // El trim Quita \r\n si es que los hay              
        }

        static function ModificarHelado($helado)
        {         
            if(self::Validar($helado->sabor) >= 0)
            {
                $file = fopen("./helados/sabores.txt", "r");

                while(!feof($file))
                {
                    $fgets = fgets($file);
                    $explode = explode(" - ", $fgets);

                    if(strcmp($explode[0],$helado->sabor)==0)
                    {
                        $newPath = self::ModificarFoto($helado->foto["name"]);
                        unlink("helados\\heladosImagen\\".trim($explode[2]));
                    
                        //file_put_contents("./helados/sabores.txt", ""); 

                        //$helado = new Helado($explode[0],$explode[1],$explode[2]);
                        //break;

                    
                        //antepongo ; al dato a borrar por que asi queda mas adelante
                        $modificar=$fgets;
                        //leo el archivo a un array, transformo el array en
                        //una cadena separada por ; (aca lo cambie por "" para omitir el segundo str rplace)
                        $cadena=join("\r\n",file("./helados/sabores.txt"));
                        //reemplazo lo que voy a borrar en la cadena por nada
                        $cadena=str_replace($modificar,$helado->sabor." - ".$helado->precio." - ".$newPath,$cadena."\r\n");
                        //reeemplazo los ; por saltos de línea
                        //$cadena=str_replace(";","\r\n",$cadena);
                        //escribo la cadena resultante al archivo
                        file_put_contents("./helados/sabores.txt",$cadena);
                        break;
                    }
                }

                fclose($file);
            }
            else
            {
                echo "El helado a ser modificado no se encuentra. jaja salu2";
            }
        }

        static function ModificarFoto($path)
        {
            $explode = explode(".", $path);
            $newPath = $explode[0].".".date("his").".".$explode[1];

            $origen = "helados\\heladosImagen\\".$path;
            $destino = "helados\\heladosImagen\\".$newPath;

            //rename(trim($origen), trim($destino)); // El trim Quita \r\n si es que los hay 

            move_uploaded_file($_FILES["foto"]["tmp_name"], $destino);

            return $newPath;
        }
    }

    interface Ivendible
    {
        function PrecioMasIva();
    }

?>