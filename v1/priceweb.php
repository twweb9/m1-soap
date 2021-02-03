<?php

//SOAP V1
$client = new SoapClient('https://integracao.agilex.jn2.xyz/api/soap/?wsdl');

$session = $client->login('testejn2', 'teste123123'); //chave definida no admin

$result = $client->call($session, 'catalog_product.update', array('pilhas-aa', array('price' => '100'),'2'));
print "<pre>";
print_r($result);
print "</pre>";

?>
