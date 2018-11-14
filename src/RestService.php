<?php 

class RestService {
  protected $restBaseUrl = 'http://localhost:11770/v1.0.0';
  protected $http = null;
  public function prepareApiClient()
  {
    if(!$this->http){
      $this->http = new GuzzleHttp\Client([
        'base_uri' => $this->restBaseUrl,
      ]);
    }

    return $this->http;
  }

  static function arr_get($arr, $key, $def=NULL){
    return isset($arr[$key]) ? $arr[$key] : $def;
  }

  public function generarComprobante($soap_comprobante)
  {
    $this->prepareApiClient();

    $comp = $soap_comprobante;

    $comp['totales'] = [
      'importe-total' => self::arr_get($comp, 'importe-total'),
      'total-cargos' => self::arr_get($comp, 'total-cargos'),
      'total-descuentos' => self::arr_get($comp, 'total-descuentos'),
      'total-impuestos' => self::arr_get($comp, 'total-impuestos'),
      'total-sin-impuestos' => self::arr_get($comp, 'total-sin-impuestos'),
    ];

    $payload = [
      'Comprobante' => $comp,
    ];

    file_put_contents('/tmp/debug', "\n[". date('Y-m-d H:i:s')."]: ", FILE_APPEND);
    file_put_contents('/tmp/debug', json_encode($payload, JSON_PRETTY_PRINT), FILE_APPEND);
    file_put_contents('/tmp/debug', "\n----\n\n", FILE_APPEND);
    
    $respuesta = [
      'archivoEntrada' => '-archivoEntrada-',
      'archivoPDF417' => '-archivoPDF417-',
      'archivoXML' => '-archivoXML-',
      'clienteNumeroDocumento' => '-clienteNumeroDocumento-',
      'clienteTipoDocumento' => '-clienteTipoDocumento-',
      'codigoError' => '-codigoError-',
      'correlativo' => '-correlativo-',
      'fecha' => '-fecha-',
      'fechaEmision' => '-fechaEmision-',
      'hash' => '-hash-',
      'hora' => '-hora-',
      'importeTotal' => '-importeTotal-',
      'mensajeError' => '-mensajeError-',
      'resultadoFirma' => '-resultadoFirma-',
      'ruc' => '-ruc-',
      'serie' => '-serie-',
      'tipoComprobante' => '-tipoComprobante-',
      'totalImpuestos' => '-totalImpuestos-',
    ];

    return $respuesta;
  }

  public function anularComprobante($soap_comprobante)
  {
    $this->prepareApiClient();

    $comp = $soap_comprobante;

    $comp['totales'] = [
      'importe-total' => self::arr_get($comp, 'importe-total'),
      'total-cargos' => self::arr_get($comp, 'total-cargos'),
      'total-descuentos' => self::arr_get($comp, 'total-descuentos'),
      'total-impuestos' => self::arr_get($comp, 'total-impuestos'),
      'total-sin-impuestos' => self::arr_get($comp, 'total-sin-impuestos'),
    ];

    $payload = [
      'Comprobante' => $comp,
    ];

    file_put_contents('/tmp/debug', "\n[". date('Y-m-d H:i:s')."]: ", FILE_APPEND);
    file_put_contents('/tmp/debug', json_encode($payload, JSON_PRETTY_PRINT), FILE_APPEND);
    file_put_contents('/tmp/debug', "\n----\n\n", FILE_APPEND);
    
    $respuesta = [
      'archivoEntrada' => '-archivoEntrada-',
      'archivoPDF417' => '-archivoPDF417-',
      'archivoXML' => '-archivoXML-',
      'clienteNumeroDocumento' => '-clienteNumeroDocumento-',
      'clienteTipoDocumento' => '-clienteTipoDocumento-',
      'codigoError' => '-codigoError-',
      'correlativo' => '-correlativo-',
      'fecha' => '-fecha-',
      'fechaEmision' => '-fechaEmision-',
      'hash' => '-hash-',
      'hora' => '-hora-',
      'importeTotal' => '-importeTotal-',
      'mensajeError' => '-mensajeError-',
      'resultadoFirma' => '-resultadoFirma-',
      'ruc' => '-ruc-',
      'serie' => '-serie-',
      'tipoComprobante' => '-tipoComprobante-',
      'totalImpuestos' => '-totalImpuestos-',
    ];

    return $respuesta;
  }

  public function obtenerNotificaciones()
  {
    $this->prepareApiClient();

    $respuesta = [
      'uuid' => '123123123',
      'notificaciones' => [
        [
          'nid' => '',
          'tipo' => '',
          'comprobante' => '',
          'status' => '',
          'ruc' => '',
          'createTime' => '',
          'codigo' => '',
          'descripcion' => '',
          'cdr' => '',
        ]
      ]
    ];

    return $respuesta;
  }

  public function borrarNotificaciones()
  {
    $this->prepareApiClient();

    $respuesta = [
      'codigoError' => '123123123',
      'mensajeError' => 'ok',
    ];

    return $respuesta;
  }
}