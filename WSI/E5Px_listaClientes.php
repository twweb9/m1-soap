<?php
/**
 * Material utilizado como referência
 * http://devdocs.magento.com/guides/m1x/api/soap/customer/customer.list.html
 */

// URL para acesso à API SOAP (Altere para a URL de sua loja)
$proxy = new SoapClient('http://treinamento-jn2.agile.jn2.xyz/api/v2_soap?wsdl=1', array('cache_wsdl' => WSDL_CACHE_NONE));

// Informe seu usuário e senha para acessp à API
$session = $proxy->login((object)array('username' => 'meuUsuario', 'apiKey' => 'minhaSenha'));

$complexFilter = array( // Exemplos de busca por filtros complexos
    'complex_filter' => array(
        array(
            'key' => 'group_id', // Exemplo de busca por grupo de cliente
            'value' => array('key' => 'in', 'value' => '1,3')
        )
    )
);

$result = $proxy->customerCustomerList(array(
    'sessionId' => $session,
    'filters' => $complexFilter // Se não deseja aplicar filtro (buscar todos clientes), passe: 'filters' => null
));

var_dump($result);

exit;