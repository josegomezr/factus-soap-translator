<?php

require './vendor/autoload.php';
require './src/RestService.php';

// cambiar por la URL real del servidor.
$namespace = "http://localhost/soap-translator";
 
// create a new soap server
$server = new soap_server();
 
// configure our WSDL
$server->configureWSDL("Factus", $namespace);
$server->xml_encoding = 'utf-8';
$server->soap_defencoding = 'utf-8';
// set our namespace
$server->wsdl->schemaTargetNamespace = $namespace;

$types = require './src/Types.php';

foreach ($types as $type) {
  $server->wsdl->addComplexType(
    $type['name'],
    $type['typeClass'],
    $type['phpType'],
    $type['compositor'],
    $type['restrictionBase'],
    $type['elements'],
    $type['attrs'],
    $type['arrayType']
  );
}

 //Register a method that has parameters and return types
$server->register( 
  'RestService.generarComprobante', // method name:
  array( // parameter list:
    'comprobante' => 'tns:Comprobante'
  ), 
  array( // return value(s):
    'return'=>'tns:ComprobanteAPIResponse'
  ), 
  $namespace, // namespace
  false, // soapaction: (use default)
  'rpc', // style: rpc or document
  'encoded', // use: encoded or literal
  'Simple Hello World Method' // description: documentation for the method
);

$server->register( 
  'RestService.anularComprobante', // method name:
  array( // parameter list:
    'comprobante' => 'tns:Comprobante'
  ), 
  array( // return value(s):
    'return'=>'tns:ComprobanteAPIResponse'
  ), 
  $namespace, // namespace
  false, // soapaction: (use default)
  'rpc', // style: rpc or document
  'encoded', // use: encoded or literal
  'Simple Hello World Method' // description: documentation for the method
);

$server->register( 
  'RestService.obtenerNotificaciones', // method name:
  array( // parameter list:
  ), 
  array( // return value(s):
    'return'=>'tns:NotificacionAPIResponse'
  ), 
  $namespace, // namespace
  false, // soapaction: (use default)
  'rpc', // style: rpc or document
  'encoded', // use: encoded or literal
  'Simple Hello World Method' // description: documentation for the method
);

$server->register( 
  'RestService.borrarNotificaciones', // method name:
  array( // parameter list:
    'xsd:string'
  ), 
  array( // return value(s):
    'return' => 'tns:BorrarNotificacionesAPIResponse'
  ), 
  $namespace, // namespace
  false, // soapaction: (use default)
  'rpc', // style: rpc or document
  'encoded', // use: encoded or literal
  'Simple Hello World Method' // description: documentation for the method
);

// Get our posted data if the service is being consumed
// otherwise leave this data blank.
$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : file_get_contents("php://input");

// pass our posted data (or nothing) to the soap service
$server->service($POST_DATA);
exit(); 