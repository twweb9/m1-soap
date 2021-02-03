<?php  
$proxy = new SoapClient('http://sualoja.com.br/api/v2_soap?wsdl=1');


$sessionId = $proxy->login('USER', 'PASS'); // TODO : change login and pwd if necessary
$filter = array('filter' => array(array('key' => 'state', 'value' => 'processing')));
$result = $proxy->salesOrderList($sessionId, $filter);
var_dump($result);
