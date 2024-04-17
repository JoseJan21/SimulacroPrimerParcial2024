<?php
// En la clase Cliente:
// 0. Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de
// documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
// 1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
// 2. Los métodos de acceso de cada uno de los atributos de la clase.
// 3. Redefinir el método _toString para que retorne la información de los atributos de la clase.

class Cliente{
    private $nombre;
    private $apellido;
    private $dadoDeBaja;
    private $tipoDeDocumento;
    private $numDocumento;

    public function __construct($nombre, $apellido, $dadoDeBaja, $tipoDeDocumento, $numDocumento){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dadoDeBaja = $dadoDeBaja;
        $this->tipoDeDocumento = $tipoDeDocumento;
        $this->numDocumento = $numDocumento;
    }

    public function getNombre() {
        $nombre = $this->nombre;
        return $nombre;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function getApellido() {
        $apellido = $this->apellido;
        return $apellido;
    }
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    public function getDadoDeBaja() {
        $dadoDebaja = $this->dadoDeBaja;
        return $dadoDeBaja;
    }
    public function setDadoDeBaja($dadoDeBaja) {
        $this->dadoDeBaja = $dadoDeBaja;
    }
    public function getTipoDeDocumento() {
        $tipoDeDocumento = $this->tipoDeDocumento;
        return $tipoDeDocumento;
    }
    public function setTipoDeDocumento($tipoDeDocumento) {
        $this->tipoDeDocumento = $tipoDeDocumento;
    }public function getNumDocumento() {
        $numDocumento = $this->numDocumento;
        return $numDocumento;
    }
    public function setNumDocumento($numDocumento) {
        $this->numDocumento = $numDocumento;
    }

    public function __toString(){
        $dadoDeBaja = "No";
        if ($this->dadoDeBaja) {
            $dadoDeBaja = "Sí";
        }
    
        return "Nombre Cliente: " . $this->nombre . "\n" .
               "Apellido Cliente: " . $this->apellido . "\n" .
               "Dado de baja: " . $dadoDeBaja . "\n" .
               "Tipo de documento: " . $this->tipoDeDocumento . "\n" .
               "Dni Cliente: " . $this->numDocumento . "\n";
    }
}
