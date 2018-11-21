<?php 

use GuzzleHttp\Exception\RequestException;

class RestService {
  protected $restBaseUrl = 'http://63a4c4b1.ngrok.io';
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

  static function escapeBadChars(&$item, $key){
    
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

    unset ($comp['importe-total']);
    unset ($comp['total-cargos']);
    unset ($comp['total-descuentos']);
    unset ($comp['total-impuestos']);
    unset ($comp['total-sin-impuestos']);

    if(self::arr_get($comp, 'impuestos', false) !== false){
      $comp['impuestos'] = self::arr_get($comp['impuestos'], 0, []);
    }

    if(self::arr_get($comp, 'propiedades-adicionales', false) !== false){
      $comp['propiedades-adicionales'] = self::arr_get($comp['propiedades-adicionales'], 0, []);
    }
    
    if(self::arr_get($comp, 'items', false) !== false){
      # $comp['items'] = self::arr_get($comp['items'], 0, []);

      foreach ($comp['items'] as $item) {
        if(self::arr_get($item, 'impuestos', false) !== false){
          $item['impuestos'] = self::arr_get($item['impuestos'], 0, []);
        }

        if(self::arr_get($item, 'descuentos-cargos', false) !== false){
          $item['descuentos-cargos'] = self::arr_get($item['descuentos-cargos'], 0, []);
        }
      }
    }

    $payload = [
      'Comprobante' => $comp,
    ];

    // para debuggear la entrada hay que loggearla en un archivo colateral
    // cualquiera de estas ayuda.
    // error_log(json_encode($payload));  
    // file_put_content('debug.txt', $payload);
    try {
      
      $response = $this->http->post('/v1.0.0/comprobantes/generar', [
        'body' => json_encode($payload, JSON_UNESCAPED_SLASHES),
        'headers' => [
          'Accept'     => 'application/json',
          'Content-type'     => 'application/json',
        ]
      ]);
      $respuesta = json_decode($response->getBody());
      $respuesta = $respuesta->respuesta;
    } catch (RequestException $e) {
      // $req = $e->getRequest();
      $resp = $e->getResponse();
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
      $response = $this->http->post('/v1.0.0/comprobantes/anular', [
        'body' => json_encode($payload, JSON_UNESCAPED_SLASHES),
        'headers' => [
          'Accept'     => 'application/json',
          'Content-type'     => 'application/json',
        ]
      ]);
      $respuesta = json_decode($response->getBody());
      $respuesta = $respuesta->respuesta;
    } catch (RequestException $e) {
      $resp = $e->getResponse();

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
      $response = $this->http->get('/v1.0.0/notificaciones');
      $respuesta = json_decode($response->getBody());
      $nueva_resp = (array)$respuesta;
      $nueva_resp['notificaciones'] = array_map(function($item){
        return (array)$item;
      }, $nueva_resp['notificaciones']);
      $respuesta = $nueva_resp;
    } catch (RequestException $e) {
      $respuesta = [
        'api-error' => 'REQUEST-ERROR',
      ];
    }
    $str = print_r($respuesta, 1);
    file_put_contents('/tmp/debugger.log', $str."\n", FILE_APPEND);
    return $respuesta;
  }

  public function borrarNotificaciones($uuid)
  {
    $this->prepareApiClient();

    try {
      $response = $this->http->delete("/v1.0.0/notificaciones/{$uuid}");
      $respuesta = json_decode($response->getBody());
    } catch (RequestException $e) {
      $respuesta = [
        'api-error' => 'REQUEST-ERROR',
      ];
    }

    return $respuesta;
  }
}