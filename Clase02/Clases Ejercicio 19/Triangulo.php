<?php

    class Triangulo extends FiguraGeometrica
    {
        private $_altura;
        private $_base;

        public function __construct($b, $h)
        {
            //parent::__construct();
            $this->_altura = $h;
            $this->_base = $b;
            $this->CalcularDatos();
        }

        protected function CalcularDatos()
        {
            $this->_perimetro = 0;
            $this->_superficie = ($this->_base * $this->_altura) / 2;
        }

        public function Dibujar()
        {      
            $puntos = 1;
            $triangulo = "<font color=\"" . $this->_color . "\">";
            for ($i=0; $i < $this->_altura; $i++)
            {
                if ($puntos <= $this->_base)
                {
                    for ($k=$this->_altura - $i; $k > 0; $k--)
                    {
                        $triangulo .= "&nbsp;";
                    }
                    for ($j=0; $j < $puntos; $j++)
                    {
                        $triangulo .= "*";
                    }
                    $puntos += 2;
                }
                $triangulo .= "<br/>";
            }
            $triangulo .= "</font>";
            echo $triangulo;

        }

        public function ToString()
        {
            return parent::ToString()."Altura: ".$this->_altura." Base: ".$this->_base."<br><br>";
        }
    }

?>