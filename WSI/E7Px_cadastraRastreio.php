<?php
/**
 * Material utilizado como referência
 * http://devdocs.magento.com/guides/m1x/api/soap/sales/salesOrderShipment/sales_order_shipment.addTrack.html
 */

// URL para acesso à API SOAP (Altere pahttps://www.farmafam.com.brra a URL de sua loja)
$proxy = new SoapClient('http://treinamento-jn2.agile.jn2.xyz/api/v2_soap/?wsdl', array('cache_wsdl' => WSDL_CACHE_NONE));

// Informe seu usuário e senha para acessp à API
$session = $proxy->login((object)array('username' => 'meuUsuario', 'apiKey' => 'minhaSenha'));

$result = $proxy->salesOrderShipmentAddTrack(
    (object)array(
        'sessionId' => $session->result,
        'shipmentIncrementId' => '100000013', // Número da entrega (não confundir com número do pedido)
        'carrier' => 'akhilleus', // Código do método de envio
        'title' => 'Teste',
        'trackNumber' => 'TESTE123' // Número de rastreio
    )
);

var_dump($result->result);