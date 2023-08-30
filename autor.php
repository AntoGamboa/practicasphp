<?php 
    class autor{
        private $cod_autor;
        public function getCod_autor() { return $this->cod_autor; } 
        public function setCod_autor($cod_autor) { $this->cod_autor = $cod_autor;}
        
        private $nombre;
        public function getNombre() { return $this->nombre; } 
        public function setNombre($nombre) { $this->nombre = $nombre; }
        
        private $nacion;
        public function getNacion() { return $this->nacion; }
        public function setNacion($nacion) { $this->nacion = $nacion; return $this; }

        //constructor
        
        public function __construct($codigo,$nombre,$nacion)
        {
            $this->cod_autor=$codigo;
            $this->nombre=$nombre;
            $this->nacion=$nacion;
        }
        

        
       
    }


?>