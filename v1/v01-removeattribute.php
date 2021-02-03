<?php

//PASSO 1

//Verificando informaçoes do atributos
//v1
$client = new SoapClient('https://SUALOJA.COM/api/soap/?wsdl');

$session = $client->login('user', 'senha');
$result = $client->call($session, 'product_attribute.info', 'color'); //attribute_code ou id
var_dump ($result);


//***************************************************************************
//PASSO 2

//Remover opção de atributo
//v1
$proxy = new SoapClient('https://SUALOJA.COM/api/soap/?wsdl');
$sessionId = $proxy->login('user', 'senha');

$attributeCode = "color";
$optionId = 54; // Existing option ID

$result = $proxy->call(
$sessionId,
"product_attribute.removeOption",
array(
$attributeCode,
$optionId
)
);

var_dump($result);
