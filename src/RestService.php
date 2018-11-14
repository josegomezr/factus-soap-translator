<?php 

use GuzzleHttp\Exception\RequestException;

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

    // para debuggear la entrada hay que loggearla en un archivo colateral
    // cualquiera de estas ayuda.
    // error_log(json_encode($payload));  
    // file_put_content('debug.txt', $payload);

    try {
      $response = $this->http->post('/comprobantes/generar', [
        'json' => $payload
      ]);
      $respuesta = json_decode($response->getBody());
    } catch (RequestException $e) {
      $respuesta = [
        'api-error' => 'REQUEST-ERROR',
      ];
    }

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

    try {
      $response = $this->http->post('/comprobantes/anular', [
        'json' => $payload
      ]);
      $respuesta = json_decode($response->getBody());
    } catch (RequestException $e) {
      $respuesta = [
        'api-error' => 'REQUEST-ERROR',
      ];
    }

    return $respuesta;
  }

  public function obtenerNotificaciones()
  {
    $this->prepareApiClient();

    try {
      $response = $this->http->get('/notificaciones');
      $respuesta = json_decode($response->getBody());
    } catch (RequestException $e) {
      $respuesta = [
        'api-error' => 'REQUEST-ERROR',
      ];
    }
    
    return $respuesta;
  }

  public function borrarNotificaciones($uuid)
  {
    $this->prepareApiClient();

    try {
      $response = $this->http->delete("/notificaciones/{$uuid}");
      $respuesta = json_decode($response->getBody());
    } catch (RequestException $e) {
      $respuesta = [
        'api-error' => 'REQUEST-ERROR',
      ];
    }

    return $respuesta;
  }
}