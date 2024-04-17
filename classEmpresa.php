<?php
//  En la clase Empresa:
//  1. Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
//  motos y la colección de ventas realizadas.
//  2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
//  3. Los métodos de acceso para cada una de las variables instancias de la clase.
//  4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
//  5. Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
//  retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
//  6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
//  parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
//  se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
//  Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
//  para registrar una venta en un momento determinado.
//  El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
//  venta.
//  7. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
//  número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.
include "classVenta.php";
include "classMoto.php";
include "classCliente.php";

class Empresa{
    private $denominacion;
    private $direccion;
    private $coleccionClientes;
    private $coleccionMotos;
    private $coleccionVentasRealizadas;

    public function __construct($denominacion, $direccion, $coleccionClientes, $coleccionMotos, $coleccionVentasRealizadas){
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->coleccionClientes = $coleccionClientes;
        $this->coleccionMotos = $coleccionMotos;
        $this->coleccionVentasRealizadas = $coleccionVentasRealizadas;
    }

    public function getDenominacion(){
        $denominacion = $this->denominacion;
        return $denominacion;
    }
    public function setDenominacion($denominacion){
        $this->denominacion = $denominacion;
    }
    public function getDireccion(){
        $direccion = $this->direccion;
        return $direccion;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function getColeccionClientes(){
        $coleccionClientes = $this->coleccionClientes;
        return $coleccionClientes;
    }
    public function setColeccionClientes($coleccionClientes){
        $this->coleccionClientes = $coleccionClientes;
    }
    public function getColeccionMotos(){
        $coleccionMotos = $this->coleccionMotos;
        return $coleccionMotos;
    }
    public function setColeccionMotos($coleccionMotos){
        $this->coleccionMotos = $coleccionMotos;
    }
    public function getColeccionVentasRealizadas(){
        $coleccionVentasRealizadas = $this->coleccionVentasRealizadas;
        return $coleccionVentasRealizadas;
    }
    public function setColeccionVentasRealizadas($coleccionVentasRealizadas) {
        $this->coleccionVentasRealizadas = $coleccionVentasRealizadas;
    }

    public function __toString(){
    $denominacion = "\nDenominación empresa: " . $this->denominacion . "\n";
    $direccion = "Dirección empresa: " . $this->direccion . "\n";

    $coleccionMotos = "Colección de motos:\n";
    foreach ($this->coleccionMotos as $moto){
        $coleccionMotos .= $moto . "\n";
    }

    $coleccionClientes = "Colección de clientes de la empresa:\n";
    foreach ($this->coleccionClientes as $cliente){
        $coleccionClientes .= $cliente . "\n";
    }

    $coleccionVentasRealizadas = "Colección de ventas realizadas:\n";
    foreach ($this->coleccionVentasRealizadas as $venta){
        $coleccionVentasRealizadas .= $venta . "\n";
    }

    return $denominacion . $direccion . $coleccionMotos . $coleccionClientes . $coleccionVentasRealizadas;
}

    public function retornarMoto($codigoMoto){
        $motoEncontrada = null;
    
        $i = 0;
        while ($i < count($this->coleccionMotos) && !$motoEncontrada){
            $moto = $this->coleccionMotos[$i];
            if ($moto->getCodigo() == $codigoMoto){
                $motoEncontrada = $moto;
            }
            $i++;
        }
    
        return $motoEncontrada; // Retornar la moto encontrada o null si no se encontró
    }
    
    public function registrarVenta($codigosMotos, $cliente){
        $motosVenta = [];
        $montoTotal = 0;
    
        $index = 0;
        $coincidencia = false;

        while ($index < count($this->coleccionMotos) && !$found){
            $moto = $this->coleccionMotos[$index];
            
            if (in_array($moto->getCodigo(), $codigosMotos)){
                $motosVenta[] = $moto;
                $montoTotal += $moto->getCosto();
                $coincidencia = true; // Detener el bucle al encontrar una coincidencia
            }

            $index++;
        }


    
        // Verificar que todas las motos estén activas
        foreach ($motosVenta as $moto){
            if (!$moto->getActiva()){
                $mensaje = "Error: La moto '" . $moto->getDescripcion() . "' no está activa y no puede ser vendida.";
            }
        }
    
        // Crear la venta
        $fechaVenta = date("Y-m-d");
        $venta = new Venta($codigoVenta, $cliente, $motosVenta, $montoTotal, $fechaVenta);
    
        // Agregar la venta al registro de ventas de la empresa
        $this->coleccionVentasRealizadas[] = $venta;
    
        return "Venta registrada con éxito.\n" . $mensaje . $venta;
    }

    public function retornarVentasXCliente($tipo, $numDoc){
        $ventasCliente = [];
        foreach ($this->ventas as $venta){
            $clienteVenta = $venta->getCliente();
            if ($clienteVenta->getTipoDocumento() === $tipo && $clienteVenta->getNumeroDocumento() === $numDoc){
                $ventasCliente[] = $venta;
            }
        }
        return $ventasCliente;
    }
}
