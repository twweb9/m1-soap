<?php

$proxy = new SoapClient('http://testeapi.agilex.jn2.xyz/api/v2_soap/?wsdl'); // TODO : change url
$sessionId = $proxy->login('testejn2', 'teste123123'); // TODO : change login and pwd if necessary

$result = $proxy->salesOrderAddComment($sessionId, '1000054', 'processing', 'teste comente');
var_dump($result);