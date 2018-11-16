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
  'fecha-emision' => '2018-01-01',
  "serie-correlativo" => "FA12-00000004",
  "tipo-comprobante" => "01",
  "tipo-moneda" => "PEN",
  "tipo-operacion" => "0101",
  'propiedades-adicionales' => array(
    array(
      array(
        "id" => "1000",
        "valor" => "DOSCIENTOS SEIS CON 25/100 SOLES",
        "nombre" => "monto en letras",
      ),
    ),
  ),
  "emisor" => array(
    "numero-documento" => 20543314529,
    "tipo-documento" => "6",
    "nombre-comercial" => "VIDRIERIA LIMATAMBO SOCIEDAD ANONIMA CER",
    "razon-social" => "VIDRIERIA LIMATAMBO SOCIEDAD ANONIMA CER",
    "ubigeo" => "130107",
    "pais" => "PE",
    "departamento" => "LIMA",
    "provincia" => "LIMA",
    "distrito" => "SAN JUAN DE LURIGANC",
    "direccion" => "AV. PROC. DE LA INDEPENDE",
    "establecimiento" => 1000,
  ),
  "cliente" => array(
    "numero-documento" => "10218825945",
    "tipo-documento" => "6",
    "razon-social" => "FLORES JIMENEZ JIMER",
    "pais" => "PE",
    "direccion" => "JR. SANTA ROSA 5 ET",
  ),
  'items' => array(
    array(
    'id' => 1,
    'precio-venta' => 3,
    'cantidad' => 3,
    'unidad-medida' => 'aaa',
    'descripcion' => 'looool',
    'codigo-producto' => '1dasdasdas',
    'codigo-producto-sunat' => '1sdadasd',
    'total-item' => 1,
    'precio-unitario' => 123,
    'tipo-precio' => '1',
    'impuestos' => array(
      array(
        array(
          "afectacion-igv" => "10",
          "base-imponible" => 174.79,
          "id" => "VAT",
          "nombre" => "IGV",
          "sunat-id" => "1000",
          "total-impuesto" => 31.46
        ),
        array(
          "afectacion-igv" => "10",
          "base-imponible" => 174.79,
          "id" => "VAT",
          "nombre" => "IGV",
          "sunat-id" => "1000",
          "total-impuesto" => 31.46
        )
      ),
    ),
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
  )
  ),
  'otros-atributos' => array(
    array(
      'grupo' => 'x',
      'nombre' => 'x',
      'valor' => 'x',
    )
  ),

  'impuestos' => array(
    array(
      array(
        "afectacion-igv" => "10",
        "base-imponible" => 174.79,
        "id" => "VAT",
        "nombre" => "IGV",
        "sunat-id" => "1000",
        "total-impuesto" => 31.46
      ),
    ),
  ),
);
$uuid = 'uuid';
$result = $client->call('RestService.generarComprobante', [
  'comprobante' => $comprobante
]);

// Display the request and response
echo '<h2>Request</h2>';
echo '<pre style="white-space: pre-line;">' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre style="white-space: pre-line;">' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
echo '<hr>';


$result = $client->call('RestService.anularComprobante', [
  'comprobante' => $comprobante
]);

// Display the request and response
echo '<h2>Request</h2>';
echo '<pre style="white-space: pre-line;">' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre style="white-space: pre-line;">' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
echo '<hr>';

$result = $client->call('RestService.borrarNotificaciones', ['uuid' => $uuid]);

// Display the request and response
echo '<h2>Request</h2>';
echo '<pre style="white-space: pre-line;">' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre style="white-space: pre-line;">' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
echo '<hr>';

$result = $client->call('RestService.obtenerNotificaciones', []);

// Display the request and response
echo '<h2>Request</h2>';
echo '<pre style="white-space: pre-line;">' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre style="white-space: pre-line;">' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';