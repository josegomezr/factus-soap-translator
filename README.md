SOAP -> JSON Translator
=======================

Instalación
-----------

(Prerequisito: [Composer](https://getcomposer.org/))

Clona el repositorio (o descarga el zip.). Luego:

```bash
cd soap-translator/
composer install
# revisa el servicio en tu servidor web. ej: http://localhost/soap-translator/
```

SOAP Request Envelopes
----------------------

Las Peticiones de ejmplo están guardados en la carpeta 
[request_envelopes](docs/request_envelopes). Tiene ejemplos de Envelopes para 
los 4 endpoints.

SOAP Response Envelopes
-----------------------

Las Respuestas están guardadas en la carpeta [docs/response_envelopes](docs/response_envelopes). 

[apiError.xml](docs/response_envelopes/apiError.xml) es un ejemplo en caso de 
error, **todos** las peticiones que den error de conexión y/o errores >400
retornarán un esquema similar (solo cambian las referencias al response correspondiente).


Sample JSON
-----------

Los endpoints de Anular/Generar comprobante fueron moldeados en función de los 
documentos jsons presentes en [esta carpeta](docs/sample_json_requests).

Y este traductor genera a partir de la estructura de datos presente en `client.php`
un Request Envelope para dichos endpoints que será traducido a JSON siguiendo 
el esquema de los json modelos. [Aquí](docs/generated_json_requests/generar-comprobante.json) puedes ver el generado a partir de los datos en `client.php`.

Consumo
-------

SOAP es una implementación robusta de XML-RPC. Así que usa los mismos medios. Para
Activar el servicio hay que hacer una petición POST, con el Envelope correspondiente a
la siguiente url:

```
http://tu-servidor/ruta/?wdl
; ejemplo: http://localhost/soap-translator/?wsdl
; o incluso: http://soap.tu-servicio.com/?wsdl
```

ERRORES COMUNES
--------------

* RequestError: Cualquier error > 400 hará que se retorne la respuesta correspondiente,
con el mensaje **RequestError**.
* SOAP Fault `Operation &apos;&apos; is not defined in the WSDL for this service`: Revisar los encodings, esta libreria usa UTF-8. Asegurarse de que ambos extremos están usando UTF-8 en las comunicaciones.


Generar Respuestas de Ejemplo
-----------------------------

[client.php](client.php) tiene un ejemplo de un SOAP Client usando NuSOAP. Están
los 4 endpoints llamados allí, y sirven para generar XML de prueba con tan solo
alterar la estructura de cada parámetro.


Ejemplo CRUDO
-------------

```
POST /soap-translator/?wsdl HTTP/1.1
Accept: text/xml
Accept-Encoding: gzip, deflate
Connection: keep-alive
Content-Length: 540
Content-type: text/xml; charset=utf-8
Host: localhost
SOAPAction: ""
User-Agent: HTTPie/0.9.9

<?xml version="1.0" encoding="utf-8"?>
<SOAP-ENV:Envelope SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"
    xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/">
    <SOAP-ENV:Body>
        <ns9447:RestService.obtenerNotificaciones xmlns:ns9447="http://tempuri.org"></ns9447:RestService.obtenerNotificaciones>
    </SOAP-ENV:Body>
</SOAP-ENV:Envelope>

```

El servidor emitirá la respuesta apropiada:

```
HTTP/1.1 200 OK
Connection: keep-alive
Content-Length: 892
Content-Type: text/xml; charset=utf-8
Date: Fri, 16 Nov 2018 02:06:38 GMT
Server: NuSOAP Server v0.9.5
X-SOAP-Server: NuSOAP/0.9.5 (1.123)

<?xml version="1.0" encoding="utf-8"?>
<SOAP-ENV:Envelope SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"
    xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/"
    xmlns:tns="http://localhost/soap-translator">
    <SOAP-ENV:Body>
        <ns1:RestService.obtenerNotificacionesResponse xmlns:ns1="http://tempuri.org">
            <return xsi:type="tns:NotificacionAPIResponse">
                <notificaciones xsi:type="SOAP-ENC:Array" SOAP-ENC:arrayType="tns:Notificacion[0]"></notificaciones>
                <uuid xsi:type="xsd:string">49965d0e-ef9f-436b-87de-ce894bcb8a4f</uuid>
            </return>
        </ns1:RestService.obtenerNotificacionesResponse>
    </SOAP-ENV:Body>
</SOAP-ENV:Envelope>

```