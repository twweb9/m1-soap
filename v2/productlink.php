<?php
/*
$proxy = new SoapClient('https://www.cashbox.com.br/api/v2_soap/?wsdl');
$sessionId = $proxy->login((object)array('username' => 'testejn2', 'apiKey' =>
'teste123123'));
$result = $proxy->catalogProductLinkAssign((object)array('sessionId' => $sessionId-
>result, 'type' => 'related', 'productId' => '853', 'linkedProductId' => '873','871'));
var_dump($result->result);
*/


$proxy = new SoapClient('https://testeapi.agilex.jn2.xyz/api/v2_soap/?wsdl');
$sessionId = $proxy->login('testejn2', 'teste123123');
$result = $proxy->catalogProductLinkAssign($sessionId, 'related', '194', '187');
var_dump($result);

 ?>
