<?php
$proxy = new SoapClient('https://testeapi.agilex.jn2.xyz/api/v2_soap/?wsdl');
$sessionId = $proxy->login('testejn2', 'teste123123');
$result = $proxy->catalogProductLinkList($sessionId, 'related', '194');
var_dump($result);

 ?>
