<?php
//  Implementar un script TestEmpresa en la cual:
//  1. Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.
//  2. Cree 3 objetos Motos con la información visualizada en la tabla: código, costo, año fabricación,
//  descripción, porcentaje incremento anual, activo.
// Tabla

// 4. Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av
//  Argenetina 123”, colección de motos= [$obMoto1, $obMoto2, $obMoto3] , colección de clientes =
//  [$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].
//  5. Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
//  $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
//  punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido.
//  6. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
//  $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
//  punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido.
//  7. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
//  $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
//  punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido.
//  8. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
//  corresponden con el tipo y número de documento del $objCliente1.
//  9. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
//  corresponden con el tipo y número de documento del $objCliente2
//  10. Realizar un echo de la variable Empresa creada en 2.

include "classEmpresa.php";

// Crear instancias de clientes
$objCliente1 = new Cliente("Lionel", "Messi", false, "DNI", 12345678);
$objCliente2 = new Cliente("Cristiano", "Ronaldo", false, "DNI", 87654321);

// Crear instancias de motos
$objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
$objMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc ", 70, true);
$objMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false); // Moto no activa

// Crear una venta
$objVenta1 = new Venta(1, "2024-04-10", $objCliente1, [$objMoto1, $objMoto2], 0); // Se inicializa en 0
$objVenta2 = new Venta(2, "2024-04-11", $objCliente2, [$objMoto2, $objMoto1,], 0); // Se inicializa en 0

// Crear una empresa
$empresa = new Empresa("Motos SRL", "Av. Principal 123", [$objCliente1, $objCliente2], [$objMoto1, $objMoto2, $objMoto3], [$objVenta1, $objVenta2]);

// Actualizar precio final de las ventas
$objVenta1->actualizarPrecioFinal();
$objVenta2->actualizarPrecioFinal();

// Mostrar información de la empresa
echo $empresa;

