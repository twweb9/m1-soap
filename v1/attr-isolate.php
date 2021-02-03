<?php
//SOAP V1
$client = new SoapClient('http://tassistemas.agilex.jn2.xyz/api/soap/?wsdl');

$session = $client->login('integrador', 'tassistemas123'); //chave definida no admin

$result = $client->call($session, 'catalog_product.update', array('teste-tas', array(
    // 'categories' => array(2),

    'color' => 32,
    'size' => 20
)));

var_dump ($result);
