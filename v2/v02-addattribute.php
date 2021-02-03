<?php

//PASSO 1

// Verificando todos os atributos do grupo
//v2
$proxy = new SoapClient('https://SUALOJA.COM/api/v2_soap/?wsdl'); //altere para o link da sua loja
$sessionId = $proxy->login('user', 'senha');
$result = $proxy->catalogProductAttributeList($sessionId, '4'); //Numero 4 corresponde ao grupo "default"
var_dump($result);


//***************************************************************************
//PASSO 2

//Cadastrando novas opções ao atributo "Color"
$client = new SoapClient('https://SUALOJA.COM/api/v2_soap/?wsdl'); //altere para o link da sua loja
//V2
$session = $proxy->login('user', 'senha');


$attributeCode = "color"; //codigo do atributo que foi buscado na rotina anterior
$label = array (
   array(
    "store_id" => array("0"),
    "value" => "Bege"
   )
  );

$data = array(
   "label" => $label,
   "order" => "2",
   "is_default" => "0"
  );

$orders = $client->catalogProductAttributeAddOption($session, $attributeCode, $data);
var_dump($orders);
