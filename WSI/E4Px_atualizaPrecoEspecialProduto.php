<?php

// Altere para a URL de sua loja
$proxy = new SoapClient('http://treinamento-jn2.agile.jn2.xyz/api/v2_soap/?wsdl', array('cache_wsdl' => WSDL_CACHE_NONE));

// Informe seu usuário e senha para acessp à API
$session = $proxy->login((object)array('username' => 'meuUsuario', 'apiKey' => 'minhaSenha'));

$result = $proxy->catalogProductSetSpecialPrice((object)array('sessionId' => $session->result, 'productId' => '598', 'specialPrice' => '176.52', 'fromDate' => '2018-04-03 00:00:00', 'toDate' => '2018-04-30 23:59:00'));


var_dump($result->result);

// If you don't need the session anymore
$proxy->endSession($session->result);
?>