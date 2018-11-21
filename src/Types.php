<?php

return [
  // Persona
  [
    'name'            => 'Persona',
    'typeClass'       => 'complexType',
    'phpType'         => 'struct',
    'compositor'      => 'all',
    'restrictionBase' => '',
    'elements'        => array( // elements
      'numero-documento' => array(
        'name' => 'numero-documento',
        'type' => 'xsd:string',
      ),
      'tipo-documento' => array(
        'name' => 'tipo-documento',
        'type' => 'xsd:string',
      ),
      'razon-social' => array(
        'name' => 'razon-social',
        'type' => 'xsd:string',
      ),
      'pais' => array(
        'name' => 'pais',
        'type' => 'xsd:string',
      ),
      'direccion' => array(
        'name' => 'direccion',
        'type' => 'xsd:string',
      ),
      'nombre-comercial' => array(
        'name' => 'nombre-comercial',
        'type' => 'xsd:string',
        'minOccurs' => 0,
      ),
      'ubigeo' => array(
        'name' => 'ubigeo',
        'type' => 'xsd:string',
        'minOccurs' => 0,
      ),
      'departamento' => array(
        'name' => 'departamento',
        'type' => 'xsd:string',
        'minOccurs' => 0,
      ),
      'provincia' => array(
        'name' => 'provincia',
        'type' => 'xsd:string',
        'minOccurs' => 0,
      ),
      'distrito' => array(
        'name' => 'distrito',
        'type' => 'xsd:string',
        'minOccurs' => 0,
      ),
      'establecimiento' => array(
        'name' => 'establecimiento',
        'type' => 'xsd:int',
        'minOccurs' => 0,
      ),
    ),
    'attrs' => array(),
    'arrayType' => '',
  ],

  [
    'name'            => 'Impuesto',
    'typeClass'       => 'complexType',
    'phpType'         => 'struct',
    'compositor'      => 'all',
    'restrictionBase' => '',
    'elements'        => array( // elements
      'id' => array(
        'name' => 'id',
        'type' => 'xsd:string',
      ),
      'sunat-id' => array(
        'name' => 'sunat-id',
        'type' => 'xsd:int',
      ),
      'nombre' => array(
        'name' => 'nombre',
        'type' => 'xsd:string',
      ),
      'total-impuesto' => array(
        'name' => 'total-impuesto',
        'type' => 'xsd:float',
      ),
      'base-imponible' => array(
        'name' => 'base-imponible',
        'type' => 'xsd:float',
      ),
      'porcentaje' => array(
        'name' => 'porcentaje',
        'type' => 'xsd:float',
        'minOccurs' => 0,
      ),
      'afectacion-igv' => array(
        'name' => 'afectacion-igv',
        'type' => 'xsd:float',
        'minOccurs' => 0,
      ),
    ),
    'attrs' => array(),
    'arrayType' => '',
  ],

  [
    'name'            => 'ItemComprobante',
    'typeClass'       => 'complexType',
    'phpType'         => 'struct',
    'compositor'      => 'all',
    'restrictionBase' => '',
    'elements'        => array( // elements
      'id' => array(
        'name' => 'id',
        'type' => 'xsd:int',
      ),
      'precio-venta' => array(
        'name' => 'precio-venta',
        'type' => 'xsd:float',
      ),
      'cantidad' => array(
        'name' => 'cantidad',
        'type' => 'xsd:float',
      ),
      'unidad-medida' => array(
        'name' => 'unidad-medida',
        'type' => 'xsd:string',
      ),
      'descripcion' => array(
        'name' => 'descripcion',
        'type' => 'xsd:string',
      ),
      'codigo-producto' => array(
        'name' => 'codigo-producto',
        'type' => 'xsd:string',
      ),
      'codigo-producto-sunat' => array(
        'name' => 'codigo-producto-sunat',
        'type' => 'xsd:string',
      ),
      'total-item' => array(
        'name' => 'total-item',
        'type' => 'xsd:float',
      ),
      'total-impuestos' => array(
        'name' => 'total-impuestos',
        'type' => 'xsd:float',
        'minOccurs' => 0,
      ),
      'precio-unitario' => array(
        'name' => 'precio-unitario',
        'type' => 'xsd:float',
      ),
      'tipo-precio' => array(
        'name' => 'tipo-precio',
        'type' => 'xsd:string',
      ),
      'impuestos' => array(
        'name' => 'impuestos',
        'type' => 'tns:ImpuestoList',
        'minOccurs' => 0,
        'maxOccurs' => 'unbounded',
      ),
      'descuentos-cargos' => array(
        'name' => 'descuentos-cargos',
        'type' => 'tns:DescuentoCargoList',
        'minOccurs' => 0,
        'maxOccurs' => 'unbounded',
      ),
    ),
    'attrs' => array(),
    'arrayType' => '',
  ],

  [
    'name'            => 'PropiedadAdicional',
    'typeClass'       => 'complexType',
    'phpType'         => 'struct',
    'compositor'      => 'all',
    'restrictionBase' => '',
    'elements'        => array( // elements
      'id' => array(
        'name' => 'id',
        'type' => 'xsd:int',
      ),
      'valor' => array(
        'name' => 'valor',
        'type' => 'xsd:string',
      ),
      'nombre' => array(
        'name' => 'nombre',
        'type' => 'xsd:string',
      ),
    ),
    'attrs' => array(),
    'arrayType' => '',
  ],
  [
    'name'            => 'AtributoComprobante',
    'typeClass'       => 'complexType',
    'phpType'         => 'struct',
    'compositor'      => 'all',
    'restrictionBase' => '',
    'elements'        => array( // elements
      'grupo' => array(
        'name' => 'grupo',
        'type' => 'xsd:string',
      ),
      'nombre' => array(
        'name' => 'nombre',
        'type' => 'xsd:string',
      ),
      'valor' => array(
        'name' => 'valor',
        'type' => 'xsd:string',
      ),
    ),
    'attrs' => array(),
    'arrayType' => '',
  ],

  [
    'name'            => 'DescuentoCargo',
    'typeClass'       => 'complexType',
    'phpType'         => 'struct',
    'compositor'      => 'all',
    'restrictionBase' => '',
    'elements'        => array( // elements
      'base-imponible' => array(
        'name' => 'base-imponible',
        'type' => 'xsd:float',
      ),
      'factor' => array(
        'name' => 'factor',
        'type' => 'xsd:float',
      ),
      'flag' => array(
        'name' => 'flag',
        'type' => 'xsd:string', // o es boolean?? quien sabe
      ),
      'id' => array(
        'name' => 'id',
        'type' => 'xsd:string',
      ),
      'monto' => array(
        'name' => 'monto',
        'type' => 'xsd:float',
      ),
    ),
    'attrs' => array(),
    'arrayType' => '',
  ],

  [
    'name'            => 'DescuentoCargoList',
    'typeClass'       => 'complexType',
    'phpType'         => 'array',
    'compositor'      => '',
    'restrictionBase' => 'soapenc:Array',
    'elements'        => array(
      
    ),
    'attrs' => array(
      array(
        'wsdl:arrayType' => 'DescuentoCargo[]',
        'ref' => 'soapenc:arrayType',
      )
    ),
    'arrayType' => 'tns:DescuentoCargo',
  ],

  [
    'name'            => 'ItemComprobanteList',
    'typeClass'       => 'complexType',
    'phpType'         => 'array',
    'compositor'      => '',
    'restrictionBase' => 'soapenc:Array',
    'elements'        => array(
      
    ),
    'attrs' => array(
      array(
        'wsdl:arrayType' => 'ItemComprobante[]',
        'ref' => 'soapenc:arrayType',
      )
    ),
    'arrayType' => 'tns:DescuentoCargo',
  ],

  [
    'name'            => 'PropiedadAdicionalList',
    'typeClass'       => 'complexType',
    'phpType'         => 'array',
    'compositor'      => '',
    'restrictionBase' => 'soapenc:Array',
    'elements'        => array(
      
    ),
    'attrs' => array(
      array(
        'wsdl:arrayType' => 'PropiedadAdicional[]',
        'ref' => 'soapenc:arrayType',
      )
    ),
    'arrayType' => 'tns:PropiedadAdicional',
  ],

  [
    'name'            => 'ImpuestoList',
    'typeClass'       => 'complexType',
    'phpType'         => 'array',
    'compositor'      => '',
    'restrictionBase' => 'soapenc:Array',
    'elements'        => array(
      
    ),
    'attrs' => array(
      array(
        'wsdl:arrayType' => 'Impuesto[]',
        'ref' => 'soapenc:arrayType',
      )
    ),
    'arrayType' => 'tns:Impuesto',
  ],

  [
    'name'            => 'Comprobante',
    'typeClass'       => 'complexType',
    'phpType'         => 'struct',
    'compositor'      => 'all',
    'restrictionBase' => '',
    'elements'        => array( // elements
      'tipo-comprobante' => array(
        'name' => 'tipo-comprobante',
        'type' => 'xsd:string',
      ),
      'serie-correlativo' => array(
        'name' => 'serie-correlativo',
        'type' => 'xsd:string',
      ),
      'fecha-emision' => array(
        'name' => 'fecha-emision',
        'type' => 'xsd:string',
      ),
      'tipo-moneda' => array(
        'name' => 'tipo-moneda',
        'type' => 'xsd:string',
      ),
      'tipo-operacion' => array(
        'name' => 'tipo-operacion',
        'type' => 'xsd:string',
      ),

      'importe-total' => array(
        'name' => 'importe-total',
        'type' => 'xsd:float',
      ),
      'total-cargos' => array(
        'name' => 'total-cargos',
        'type' => 'xsd:float',
      ),
      'total-descuentos' => array(
        'name' => 'total-descuentos',
        'type' => 'xsd:float',
      ),
      'total-impuestos' => array(
        'name' => 'total-impuestos',
        'type' => 'xsd:float',
      ),
      'total-sin-impuestos' => array(
        'name' => 'total-sin-impuestos',
        'type' => 'xsd:float',
      ),

      'emisor' => array(
        'name' => 'emisor',
        'type' => 'tns:Persona',
      ),

      'cliente' => array(
        'name' => 'cliente',
        'type' => 'tns:Persona',
      ),

      'items' => array(
        'name' => 'items',
        'type' => 'tns:ItemComprobanteList',
        'minOccurs' => 0,
        'maxOccurs' => 'unbounded',
      ),

      'impuestos' => array(
        'name' => 'impuestos',
        'type' => 'tns:ImpuestoList',
        'minOccurs' => 0,
        'maxOccurs' => 'unbounded',
      ),

      'propiedades-adicionales' => array(
        'name' => 'propiedades-adicionales',
        'type' => 'tns:PropiedadAdicionalList',
        'minOccurs' => 0,
        'maxOccurs' => 'unbounded',
      ),

      'otros-atributos' => array(
        'name' => 'otros-atributos',
        'type' => 'tns:AtributoComprobante',
        'minOccurs' => 0,
        'maxOccurs' => 'unbounded',
      ),
    ),
    'attrs' => array(),
    'arrayType' => '',
  ],

  [
    'name'            => 'ComprobanteAPIResponse',
    'typeClass'       => 'complexType',
    'phpType'         => 'struct',
    'compositor'      => 'all',
    'restrictionBase' => '',
    'elements'        => array( // elements
      'api-error' => array(
        'name' => 'api-error',
        'type' => 'xsd:string',
        'minOccurs' => 0,
      ),
      'tipo-comprobante' => array(
        'name' => 'tipo-comprobante',
        'type' => 'xsd:string',
      ),
      'archivoEntrada' => array(
        'name' => 'archivoEntrada',
        'type' => 'xsd:string',
      ),
      'archivoPDF417' => array(
        'name' => 'archivoPDF417',
        'type' => 'xsd:string',
      ),
      'archivoXML' => array(
        'name' => 'archivoXML',
        'type' => 'xsd:string',
      ),
      'clienteNumeroDocumento' => array(
        'name' => 'clienteNumeroDocumento',
        'type' => 'xsd:string',
      ),
      'clienteTipoDocumento' => array(
        'name' => 'clienteTipoDocumento',
        'type' => 'xsd:string',
      ),
      'codigoError' => array(
        'name' => 'codigoError',
        'type' => 'xsd:string',
      ),
      'correlativo' => array(
        'name' => 'correlativo',
        'type' => 'xsd:string',
      ),
      'fecha' => array(
        'name' => 'fecha',
        'type' => 'xsd:string',
      ),
      'fechaEmision' => array(
        'name' => 'fechaEmision',
        'type' => 'xsd:string',
      ),
      'hash' => array(
        'name' => 'hash',
        'type' => 'xsd:string',
      ),
      'hora' => array(
        'name' => 'hora',
        'type' => 'xsd:string',
      ),
      'importeTotal' => array(
        'name' => 'importeTotal',
        'type' => 'xsd:string',
      ),
      'mensajeError' => array(
        'name' => 'mensajeError',
        'type' => 'xsd:string',
      ),
      'resultadoFirma' => array(
        'name' => 'resultadoFirma',
        'type' => 'xsd:string',
      ),
      'ruc' => array(
        'name' => 'ruc',
        'type' => 'xsd:string',
      ),
      'serie' => array(
        'name' => 'serie',
        'type' => 'xsd:string',
      ),
      'tipoComprobante' => array(
        'name' => 'tipoComprobante',
        'type' => 'xsd:string',
      ),
      'totalImpuestos' => array(
        'name' => 'totalImpuestos',
        'type' => 'xsd:string',
      ),
    ),
    'attrs' => array(),
    'arrayType' => '',
  ],

  [
    'name'            => 'Notificacion',
    'typeClass'       => 'complexType',
    'phpType'         => 'struct',
    'compositor'      => 'all',
    'restrictionBase' => '',
    'elements'        => array(
      'nid' => array(
        'name' => 'nid',
        'type' => 'xsd:string',
      ),
      'tipo' => array(
        'name' => 'tipo',
        'type' => 'xsd:string',
      ),
      'comprobante' => array(
        'name' => 'comprobante',
        'type' => 'xsd:string',
      ),
      'status' => array(
        'name' => 'status',
        'type' => 'xsd:string',
      ),
      'ruc' => array(
        'name' => 'ruc',
        'type' => 'xsd:string',
      ),
      'createTime' => array(
        'name' => 'createTime',
        'type' => 'xsd:string',
      ),
      'codigo' => array(
        'name' => 'codigo',
        'type' => 'xsd:string',
      ),
      'descripcion' => array(
        'name' => 'descripcion',
        'type' => 'xsd:string',
      ),
      'cdr  ' => array(
        'name' => 'cdr',
        'type' => 'xsd:string',
      ),
    ),
    'attrs' => array(),
    'arrayType' => '',
  ],

  
  [
    'name'            => 'NotificacionList',
    'typeClass'       => 'complexType',
    'phpType'         => 'array',
    'compositor'      => '',
    'restrictionBase' => 'soapenc:Array',
    'elements'        => array(
      
    ),
    'attrs' => array(
      array(
        'wsdl:arrayType' => 'Notificacion[]',
        'ref' => 'soapenc:arrayType',
      )
    ),
    'arrayType' => 'tns:Notificacion',
  ],

  [
    'name'            => 'NotificacionAPIResponse',
    'typeClass'       => 'complexType',
    'phpType'         => 'struct',
    'compositor'      => 'all',
    'restrictionBase' => '',
    'elements'        => array(
      'api-error' => array(
        'name' => 'api-error',
        'type' => 'xsd:string',
        'minOccurs' => 0,
      ),
      'notificaciones' => array(
        'name' => 'notificaciones',
        'type' => 'tns:NotificacionList',
      ),
      'uuid' => array(
        'name' => 'uuid',
        'type' => 'xsd:string',
      ),
    ),
    'attrs' => array(),
    'arrayType' => '',
  ],

  [
    'name'            => 'BorrarNotificacionesAPIResponse',
    'typeClass'       => 'complexType',
    'phpType'         => 'struct',
    'compositor'      => 'all',
    'restrictionBase' => '',
    'elements'        => array(
      'api-error' => array(
        'name' => 'api-error',
        'type' => 'xsd:string',
        'minOccurs' => 0,
      ),
      'codigoError' => array(
        'name' => 'codigoError',
        'type' => 'xsd:string'
      ),
      'mensajeError' => array(
        'name' => 'mensajeError',
        'type' => 'xsd:string'
      ),
    ),
    'attrs' => array(
    ),
    'arrayType' => '',
  ],

];