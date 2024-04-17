<?php
//  En la clase Venta:
//  1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
//  motos y el precio final.
//  2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
//  atributo de la clase.
//  3. Los métodos de acceso de cada uno de los atributos de la clase.
//  4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
//  5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
//  incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
//  vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
//  Utilizar el método que calcula el precio de venta de la moto donde crea necesario.
// include "classMoto.php";

class Venta{
    private $numero;
    private $fecha;
    private $objCliente;
    private $coleccionMotosVenta = [];
    private $precioFinal;

    public function __construct($numero, $fecha, $objCliente, $coleccionMotosVenta, $precioFinal){
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->objCliente = $objCliente;
        $this->coleccionMotosVenta = $coleccionMotosVenta;
        $this->precioFinal = $precioFinal;
    }

    public function getNumero(){
        $numero = $this->numero;
        return $numero;
    }
    public function setNumero($numero){
        $this->numero = $numero;
    }
    public function getFecha(){
        $fecha = $this->fecha;
        return $fecha;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    public function getObjCliente(){
        $objCliente = $this->objCliente;
        return $objCliente;
    }
    public function setObjCliente($objCliente){
        $this->objCliente = $objCliente;
    }
    public function getColeccionMotosVenta(){
        $coleccionMotosVenta = $this->coleccionMotosVenta;
        return $coleccionMotosVenta;
    }
    public function setColeccionMotosVenta($coleccionMotosVenta){
        $this->coleccionMotosVenta = $coleccionMotosVenta;
    }
    public function getPrecioFinal(){
        $precioFinal = $this->precioFinal;
        return $precioFinal;
    }
    public function setPrecioFinal($precioFinal){
        $this->precioFinal = $precioFinal;
    }

    public function __toString(){
        $clienteInfo = "";
        if ($this->objCliente instanceof Cliente){
            $clienteInfo = $this->objCliente->getNombre() . " " . $this->objCliente->getApellido();
        }
    
        $motosInfo = "";
        foreach ($this->coleccionMotosVenta as $moto){
            $motosInfo .= "\n - " . $moto->getDescripcion();
        }
    
        return "Numero de venta: " . $this->numero . "\nFecha de venta: " . $this->fecha . "\nCliente: " . $clienteInfo . "\nLista de motos:" . $motosInfo . "\nPrecio final: $" . $this->precioFinal;
    }
    
    //  5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
    //  incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
    //  vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
    //  Utilizar el método que calcula el precio de venta de la moto donde crea necesario.

    public function incorporarMoto($objMoto){
        // Verificar si la moto está activa antes de incorporarla
        if ($objMoto->getActiva()) {
            $this->coleccionMotosVenta[] = $objMoto;
            $this->actualizarPrecioFinal();
        } else {
            echo "No se puede incorporar la moto {$objMoto->getDescripcion()} a la venta, ya que no está activa.\n";
        }
    }

    public function actualizarPrecioFinal(){
        $precioTotal = 0;
        $motosVenta = $this->coleccionMotosVenta; // Obtener la colección de motos de la venta
        $numMotos = count($motosVenta);
        $i = 0;
    
        while ($i < $numMotos){
            $moto = $motosVenta[$i];
            if($moto->darPrecioVenta() > 0){
                $precioTotal += $moto->darPrecioVenta();
            }
            $i++;
        }
    
        $this->precioFinal = $precioTotal;
    }
    
}
