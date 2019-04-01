<?php

    class Rectangulo extends FiguraGeometrica
    {
        private $_ladoDos;
        private $_ladoUno;
    
        public function __construct($l1, $l2)
        {
            //parent::__construct();
            $this->_ladoUno = $l1;
            $this->_ladoDos = $l2;
            $this->CalcularDatos();
        }

        protected function CalcularDatos()
        {
            $this->_perimetro = $this->_ladoUno * 2 +  $this->_ladoDos * 2;
            $this->_superficie = $this->_ladoUno * $this->_ladoDos;
        }

        public function Dibujar()
        {
            for($i=0; $i< $this->_ladoDos; $i++)
            {
                for($j=0; $j < $this->_ladoUno; $j++)
                {
                   //echo "*";
                   switch($this->_color)
                   {
                       case "verde":
                       //echo '<span style="color:#aaffaa">*</span>';
                       echo "<font color='green'>*</font>";
                       break;

                       case "rojo":
                       echo "<font color='red'>*</font>";
                       break;

                       case "azul":
                       echo "<font color='blue'>*</font>";
                       break;

                       default:
                       echo "*";
                   }
                   
                }

                echo "<br>";
            }
        }

        public function ToString()
        {
            return parent::ToString()."Altura: ".$this->_ladoDos." Base: ".$this->_ladoUno."<br><br>";
        }

    }  

?>