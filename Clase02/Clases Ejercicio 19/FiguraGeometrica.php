<?php

abstract class FiguraGeometrica
{
    protected $_color;
    protected $_perimetro;
    protected $_superficie;

    public function getColor() 
    {
        return $this->_color;
    }

    public function setColor(string $color)
    {
        $this->_color = $color;
    }

    public function __construct()
    {
        $this->_color = "rojo";

    }

    public abstract function Dibujar();

    protected abstract function CalcularDatos();

    public function ToString()
    {
        echo "Color: ".$this->_color."<br>";
        echo "Perimetro: ".$this->_perimetro."<br>";
        echo "Superficie: ".$this->_superficie."<br>";

        $this->Dibujar();
    }
}

?>