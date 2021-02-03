<?php
/**
 * Material utilizado como referência
 * http://devdocs.magento.com/guides/m1x/api/soap/catalog/catalogProduct/catalog_product.create.html
 *
 * [RESPOSTA] Como resposta, virá um objeto gigante com todas informações de um pedido, desde os produtos, forma de pagamento,
 * valores, estado atual do pedido e etc.
 *
 * Para entender os estágios (fluxo de status do Magento), dê uma olha em:
 * http://tiagosampaio.com/entendendo-o-fluxo-dos-status-de-pedidos-no-magento/
 */

///API v2


// URL para acesso à API SOAP (Altere para a URL de sua loja)
$proxy = new SoapClient('http://sualoja.agilex.jn2.xyz/api/v2_soap?wsdl=1');

// Informe seu usuário e senha para acessp à API
$session = $proxy->login('username', 'apikey');

$result = $proxy->salesOrderInfo($session, '1000058');

var_dump($result);

exit;




///API v2 + WSI COMPLIANCE
/*

// URL para acesso à API SOAP (Altere para a URL de sua loja)
$proxy = new SoapClient('http://treinamento-jn2.agile.jn2.xyz/api/v2_soap?wsdl=1', array('cache_wsdl' => WSDL_CACHE_NONE));

// Informe seu usuário e senha para acessp à API
$session = $proxy->login((object)array('username' => 'meuUsuario', 'apiKey' => 'minhaSenha'));

$result = $proxy->salesOrderInfo((object)array('sessionId' => $session->result, 'orderIncrementId' => '3000022'));

var_dump($result->result);

exit;
*/