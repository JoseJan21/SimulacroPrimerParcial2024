<?php
//  En la clase Moto:
//  1. Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje
//  incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
//  venta y false en caso contrario).
//  2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
//  clase.
//  3. Los métodos de acceso de cada uno de los atributos de la clase.
//  4. Redefinir el método toString para que retorne la información de los atributos de la clase.
//  5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
//  Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
//  la venta, el método realiza el siguiente cálculo:
//  $_venta = $_compra + $_compra * (anio * por_inc_anual)
//  donde $_compra: es el costo de la moto.
//  anio: cantidad de años transcurridos desde que se fabricó la moto.
//  por_inc_anual: porcentaje de incremento anual de la moto.

Class Moto{
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa; //activa (atributo que va a contener un valor true, si la moto está disponible para la venta y false en caso contrario).

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa){
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcion = $descripcion;
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
        $this->activa = $activa;
    }

    public function getCodigo(){
        $codigo = $this->codigo;
        return $codigo;
    }
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    public function getCosto(){
        $costo = $this->costo;
        return $costo;
    }
    public function setCosto($costo){
        $this->costo = $costo;
    }
    public function getAnioFabricacion(){
        $anioFabricacion = $this->anioFabricacion;
        return $anioFabricacion;
    }
    public function setAnioFabricacion($anioFabricacion){
        $this->anioFabricacion = $anioFabricacion;
    }
    public function getDescripcion(){
        $descripcion = $this->descripcion;
        return $descripcion;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    public function getPorcentajeIncrementoAnual(){
        $porcentajeIncrementoAnual = $this->porcentajeIncrementoAnual;
        return $porcentajeIncrementoAnual;
    }
    public function setPorcentajeIncrementoAnual($porcentajeIncrementoAnual){
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
    }
    public function getActiva(){
        $activa = $this->activa;
        return $activa;
    }
    public function setActiva($activa){
        $this->activa = $activa;
    }

    public function __toString(){
        $activa = "No";
        if ($this->activa){
            $activa = "Sí";
        }
        return "Codigo moto: " . $this->codigo . "\n" .
               "Costo moto: $" . $this->costo . "\n" .
               "Año de fabricacion de la moto: " . $this->anioFabricacion . "\n" .
               "Descripción de la moto: " . $this->descripcion . "\n" .
               "Porcentaje incremento anual de la moto: " . $this->porcentajeIncrementoAnual . "\n" .
               "Moto activa: " . $activa . "\n";
    }
    //  5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
    //  Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
    //  la venta, el método realiza el siguiente cálculo:
    //  $_venta = $_compra + $_compra * (anio * por_inc_anual)
    //  donde $_compra: es el costo de la moto.
    //  anio: cantidad de años transcurridos desde que se fabricó la moto.
    //  por_inc_anual: porcentaje de incremento anual de la moto.
    public function darPrecioVenta(){
        $anio = date("Y") - $this->anioFabricacion;
        if ($this->activa){
            $darPrecioVenta = $this->costo + $this->costo * ($anio * $this->porcentajeIncrementoAnual);
        } else {
            $darPrecioVenta = -1;
        }
        return $darPrecioVenta;
    }
}
