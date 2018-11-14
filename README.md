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

Ejemplo CRUDO
-------------

```
POST /soap-translator/?wsdl HTTP/1.1
Accept: application/xml
Accept-Encoding: gzip, deflate
Connection: keep-alive
Content-Length: 7225
Content-Type: text/xml; charset=utf-8
Host: localhost
User-Agent: HTTPie/0.9.9

<?xml version="1.0" encoding="utf-8"?>
<SOAP-ENV:Envelope SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"
    xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/">
    <SOAP-ENV:Body>
        <ns6165:RestService.generarComprobante xmlns:ns6165="http://tempuri.org">
            <comprobante>
                <fecha-emision xsi:type="xsd:string">2018-01-01</fecha-emision>
                <serie-correlativo xsi:type="xsd:string">FA12-00000004</serie-correlativo>
                <tipo-comprobante xsi:type="xsd:string">01</tipo-comprobante>
                <tipo-moneda xsi:type="xsd:string">PEN</tipo-moneda>
                <tipo-operacion xsi:type="xsd:string">0101</tipo-operacion>
                <propiedades-adicionales xsi:type="SOAP-ENC:Array"
                    SOAP-ENC:arrayType="SOAP-ENC:Array[1]">
                    <item xsi:type="SOAP-ENC:Array" SOAP-ENC:arrayType="unnamed_struct_use_soapval[1]">
                        <item>
                            <id xsi:type="xsd:string">1000</id>
                            <valor xsi:type="xsd:string">DOSCIENTOS SEIS CON
                                25/100 SOLES</valor>
                            <nombre xsi:type="xsd:string">monto en letras</nombre>
                        </item>
                    </item>
                </propiedades-adicionales>
                <emisor>
                    <numero-documento xsi:type="xsd:int">20543314529</numero-documento>
                    <tipo-documento xsi:type="xsd:string">6</tipo-documento>
                    <nombre-comercial xsi:type="xsd:string">VIDRIERIA LIMATAMBO
                        SOCIEDAD ANONIMA CER</nombre-comercial>
                    <razon-social xsi:type="xsd:string">VIDRIERIA LIMATAMBO
                        SOCIEDAD ANONIMA CER</razon-social>
                    <ubigeo xsi:type="xsd:string">130107</ubigeo>
                    <pais xsi:type="xsd:string">PE</pais>
                    <departamento xsi:type="xsd:string">LIMA</departamento>
                    <provincia xsi:type="xsd:string">LIMA</provincia>
                    <distrito xsi:type="xsd:string">SAN JUAN DE LURIGANC</distrito>
                    <direccion xsi:type="xsd:string">AV. PROC. DE LA INDEPENDE</direccion>
                    <establecimiento xsi:type="xsd:int">1000</establecimiento>
                </emisor>
                <cliente>
                    <numero-documento xsi:type="xsd:string">10218825945</numero-documento>
                    <tipo-documento xsi:type="xsd:string">6</tipo-documento>
                    <razon-social xsi:type="xsd:string">FLORES JIMENEZ JIMER</razon-social>
                    <pais xsi:type="xsd:string">PE</pais>
                    <direccion xsi:type="xsd:string">JR. SANTA ROSA 5 ET</direccion>
                </cliente>
                <items>
                    <id xsi:type="xsd:int">1</id>
                    <precio-venta xsi:type="xsd:int">3</precio-venta>
                    <cantidad xsi:type="xsd:int">3</cantidad>
                    <unidad-medida xsi:type="xsd:string">aaa</unidad-medida>
                    <descripcion xsi:type="xsd:string">looool</descripcion>
                    <codigo-producto xsi:type="xsd:string">1dasdasdas</codigo-producto>
                    <codigo-producto-sunat xsi:type="xsd:string">1sdadasd</codigo-producto-sunat>
                    <total-item xsi:type="xsd:int">1</total-item>
                    <precio-unitario xsi:type="xsd:int">123</precio-unitario>
                    <tipo-precio xsi:type="xsd:string">1</tipo-precio>
                    <impuestos xsi:type="SOAP-ENC:Array" SOAP-ENC:arrayType="SOAP-ENC:Array[1]">
                        <item xsi:type="SOAP-ENC:Array" SOAP-ENC:arrayType="unnamed_struct_use_soapval[2]">
                            <item>
                                <afectacion-igv xsi:type="xsd:string">10</afectacion-igv>
                                <base-imponible xsi:type="xsd:float">174.79</base-imponible>
                                <id xsi:type="xsd:string">VAT</id>
                                <nombre xsi:type="xsd:string">IGV</nombre>
                                <sunat-id xsi:type="xsd:string">1000</sunat-id>
                                <total-impuesto xsi:type="xsd:float">31.46</total-impuesto>
                            </item>
                            <item>
                                <afectacion-igv xsi:type="xsd:string">10</afectacion-igv>
                                <base-imponible xsi:type="xsd:float">174.79</base-imponible>
                                <id xsi:type="xsd:string">VAT</id>
                                <nombre xsi:type="xsd:string">IGV</nombre>
                                <sunat-id xsi:type="xsd:string">1000</sunat-id>
                                <total-impuesto xsi:type="xsd:float">31.46</total-impuesto>
                            </item>
                        </item>
                    </impuestos>
                    <descuentos-cargos xsi:type="SOAP-ENC:Array"
                        SOAP-ENC:arrayType="SOAP-ENC:Array[1]">
                        <item xsi:type="SOAP-ENC:Array" SOAP-ENC:arrayType="unnamed_struct_use_soapval[1]">
                            <item>
                                <id xsi:type="xsd:string">01</id>
                                <flag xsi:type="xsd:string">false</flag>
                                <monto xsi:type="xsd:int">1</monto>
                                <factor xsi:type="xsd:int">2</factor>
                                <base-imponible xsi:type="xsd:int">0</base-imponible>
                            </item>
                        </item>
                    </descuentos-cargos>
                </items>
                <otros-atributos xsi:type="SOAP-ENC:Array" SOAP-ENC:arrayType="unnamed_struct_use_soapval[1]">
                    <item>
                        <grupo xsi:type="xsd:string">x</grupo>
                        <nombre xsi:type="xsd:string">x</nombre>
                        <valor xsi:type="xsd:string">x</valor>
                    </item>
                </otros-atributos>
                <impuestos xsi:type="SOAP-ENC:Array" SOAP-ENC:arrayType="SOAP-ENC:Array[1]">
                    <item xsi:type="SOAP-ENC:Array" SOAP-ENC:arrayType="unnamed_struct_use_soapval[1]">
                        <item>
                            <afectacion-igv xsi:type="xsd:string">10</afectacion-igv>
                            <base-imponible xsi:type="xsd:float">174.79</base-imponible>
                            <id xsi:type="xsd:string">VAT</id>
                            <nombre xsi:type="xsd:string">IGV</nombre>
                            <sunat-id xsi:type="xsd:string">1000</sunat-id>
                            <total-impuesto xsi:type="xsd:float">31.46</total-impuesto>
                        </item>
                    </item>
                </impuestos>
            </comprobante>
        </ns6165:RestService.generarComprobante>
    </SOAP-ENV:Body>
</SOAP-ENV:Envelope>
```

El servidor emitirá la respuesta apropiada:

```
HTTP/1.1 200 OK
Connection: keep-alive
Content-Length: 2110
Content-Type: text/xml; charset=utf-8
Date: Wed, 14 Nov 2018 16:09:15 GMT
Server: NuSOAP Server v0.9.5
X-SOAP-Server: NuSOAP/0.9.5 (1.123)

<?xml version="1.0" encoding="utf-8"?>
<SOAP-ENV:Envelope SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"
    xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/"
    xmlns:tns="http://localhost/soap-translator">
    <SOAP-ENV:Body>
        <ns1:RestService.generarComprobanteResponse xmlns:ns1="http://tempuri.org">
            <return xsi:type="tns:ComprobanteAPIResponse">
                <archivoEntrada xsi:type="xsd:string">-archivoEntrada-</archivoEntrada>
                <archivoPDF417 xsi:type="xsd:string">-archivoPDF417-</archivoPDF417>
                <archivoXML xsi:type="xsd:string">-archivoXML-</archivoXML>
                <clienteNumeroDocumento xsi:type="xsd:string">-clienteNumeroDocumento-</clienteNumeroDocumento>
                <clienteTipoDocumento xsi:type="xsd:string">-clienteTipoDocumento-</clienteTipoDocumento>
                <codigoError xsi:type="xsd:string">-codigoError-</codigoError>
                <correlativo xsi:type="xsd:string">-correlativo-</correlativo>
                <fecha xsi:type="xsd:string">-fecha-</fecha>
                <fechaEmision xsi:type="xsd:string">-fechaEmision-</fechaEmision>
                <hash xsi:type="xsd:string">-hash-</hash>
                <hora xsi:type="xsd:string">-hora-</hora>
                <importeTotal xsi:type="xsd:string">-importeTotal-</importeTotal>
                <mensajeError xsi:type="xsd:string">-mensajeError-</mensajeError>
                <resultadoFirma xsi:type="xsd:string">-resultadoFirma-</resultadoFirma>
                <ruc xsi:type="xsd:string">-ruc-</ruc>
                <serie xsi:type="xsd:string">-serie-</serie>
                <tipoComprobante xsi:type="xsd:string">-tipoComprobante-</tipoComprobante>
                <totalImpuestos xsi:type="xsd:string">-totalImpuestos-</totalImpuestos>
            </return>
        </ns1:RestService.generarComprobanteResponse>
    </SOAP-ENV:Body>
</SOAP-ENV:Envelope>
```