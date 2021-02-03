<?php
/**
 * Material utilizado como referência
 * http://devdocs.magento.com/guides/m1x/api/soap/catalog/catalogProduct/catalog_product.list.html
 */

// URL para acesso à API SOAP (Altere para a URL de sua loja)
$proxy = new SoapClient('http://treinamento-jn2.agile.jn2.xyz/api/v2_soap/?wsdl', array('cache_wsdl' => WSDL_CACHE_NONE));

// Informe seu usuário e senha para acessp à API
$session = $proxy->login((object)array('username' => 'meuUsuario', 'apiKey' => 'minhaSenha'));

// Preparando filtro
$complexFilter = array(
    'complex_filter' => array(
        array(
            'key' => 'updated_at',
            'value' => array('key' => 'gt', 'value' => '2018-03-25 00:00:00') // Busca por produtos que foram atualizados acima desta data
        )
    )
);

// Chamada com filtros
$result = $proxy->catalogProductList((object)array(
    'sessionId' => $session->result,
    'filters' => $complexFilter // Se não deseja aplicar filtro, passe: 'filters' => null
));

var_dump($result->result);