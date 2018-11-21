<?php 
// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 'on');

require './vendor/autoload.php';
 
//Create a new soap server
$client = new nusoap_client('http://localhost/soap-translator/?wsdl', false);
$client->response_timeout = 5;
$client->soap_defencoding = 'utf-8';
$client->use_curl = true;

$err = $client->getError();
if ($err) {
  // Display the error
  echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
  // At this point, you know the call that follows will fail
}


// Call the SOAP method
$comprobante = array(
  'fecha-emision' => '2018-10-05',
  "serie-correlativo" => "FA12-00000006",
  "tipo-comprobante" => "01",
  "tipo-moneda" => "USD",
  "tipo-operacion" => "0200",
  'propiedades-adicionales' => array(
    array(
      array(
        "id" => 1000,
        "nombre" => "Monto en Letras",
        "valor" => "CUARENTA Y SIETE MIL NOVECIENTOS TREINTA  CON 40/100 DOLARES AMERICANOS",
      ),
    ),
  ),

  "importe-total" => 47930.4,
  "total-cargos" => 0,
  "total-descuentos" => 0,
  "total-impuestos" => 0,
  "total-sin-impuestos" => 47930.4,

  "emisor" => array(
    "numero-documento" => '20543314529',
    "tipo-documento" => "6",
    "nombre-comercial" => "complexlesS.A.C.",
    "razon-social" => "COMPLEXLESS S.A.C.",
    "ubigeo" => 150119,
    "pais" => "PE",
    "departamento" => "LIMA",
    "provincia" => "LIMA",
    "distrito" => "LURIN",
    "direccion" => "CALLE F S/N URBANIZACIN SANTA GENOVEVA",
    "establecimiento" => '10001',
  ),
  "cliente" => array(
    "numero-documento" => "-",
    "tipo-documento" => "0",
    "razon-social" => "JSC TIMBER LTD",
    "pais" => "NZ",
    "direccion" => "22 Sawmill Road, Riverhead, Auckland 0841 - Auckland - Nueva Zelanda",
  ),
  'items' => array(
    array(
      'id' => 1,
      'precio-venta' => 1640,
      'cantidad' => 27.61,
      'unidad-medida' => 'MTQ',
      'descripcion' => 'GARAPA - FSC 100% DECKING SGS-COC-002228 KILN DRIED GRADE:A IN 19MM THICKNESS',
      'codigo-producto' => '18.16.013599',
      'codigo-producto-sunat' => '41111801',
      'total-item' => 45280.4,
      'precio-unitario' => 1640,
      'tipo-precio' => '01',
      'impuestos' => array(
        array(
          array(
            "afectacion-igv" => 40,
            "base-imponible" => 45280.4,
            "id" => "FRE",
            "nombre" => "EXP",
            "sunat-id" => 9995,
            "total-impuesto" => 0,
            'porcentaje' => 0,
          ),
        ),
      ),
      /*
      "descuentos-cargos" => array(
        array(
          array(
            "id" => "01",
            "flag" => "false",
            "monto" => 1,
            "factor" => 2,
            "base-imponible" => 0,
          ),
        ),
      ),
      */
    ),
    array(
      'id' => 2,
      'precio-venta' => 2650,
      'cantidad' => 1,
      'unidad-medida' => 'NIU',
      'descripcion' => 'OCEAN FREIGHT',
      'codigo-producto' => '-',
      'codigo-producto-sunat' => '41111801',
      'total-item' => 2650,
      'precio-unitario' => 2650,
      'tipo-precio' => '01',
      'impuestos' => array(
        array(
          array(
            "afectacion-igv" => 40,
            "base-imponible" => 2650,
            "id" => "FRE",
            "nombre" => "EXP",
            "sunat-id" => 9995,
            "total-impuesto" => 0,
            'porcentaje' => 0,
          ),
        ),
      ),
      /*
      "descuentos-cargos" => array(
        array(
          array(
            "id" => "01",
            "flag" => "false",
            "monto" => 1,
            "factor" => 2,
            "base-imponible" => 0,
          ),
        ),
      ),
      */
    ),
  ),
  'otros-atributos' => array(
    array(
      "grupo" => "factus_pe",
      "nombre"=> "mail-cliente",
      "valor"=> "facturacion@Complexless.com"
    ),
    array(
      "grupo" => "factus_pe",
      "nombre"=> "mail-facturador",
      "valor"=> "facturacion@Complexless.com"
    ),
    array(
      "grupo" => "PE",
      "nombre" => "Plantilla",
      "valor" => "factura-exterior-v1.jasper"
    ),
  ),

  'impuestos' => array(
    array(
      array(
          "base-imponible" => 47930.4,
          "id" => "FRE",
          "nombre" => "EXP",
          "sunat-id" => 9995,
          "total-impuesto" => 0,
      ),
    ),
  ),
);
$uuid = 'b0ccfaa7-d768-4fde-9001-5c53b111eab9';
/*$result = $client->call('RestService.generarComprobante', [
  'comprobante' => $comprobante
]);

// Display the request and response
echo '<h2>Request</h2>';
echo '<pre style="white-space: pre-line;">' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre style="white-space: pre-line;">' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
echo '<hr>';*/

/*$result = $client->call('RestService.anularComprobante', [
  'comprobante' => $comprobante
]);

// Display the request and response
echo '<h2>Request</h2>';
echo '<pre style="white-space: pre-line;">' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre style="white-space: pre-line;">' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
echo '<hr>';*/

/*$result = $client->call('RestService.obtenerNotificaciones', []);

// Display the request and response
echo '<h2>Request</h2>';
echo '<pre style="white-space: pre-line;">' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre style="white-space: pre-line;">' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';*/


$result = $client->call('RestService.borrarNotificaciones', ['uuid' => $uuid]);

// Display the request and response
echo '<h2>Request</h2>';
echo '<pre style="white-space: pre-line;">' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre style="white-space: pre-line;">' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
echo '<hr>';
/*
*/