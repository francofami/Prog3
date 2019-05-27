<?php

    class Usuario
    {
        public $tipo;
        public $nombre;

        public function __construct($tipo, $nombre)
        {
            $this->tipo = $tipo;
            $this->nombre = $nombre;
        }

        public function ToString()
        {
            return $this->tipo .  " - " . $this->nombre . "\r\n";
        }
    }