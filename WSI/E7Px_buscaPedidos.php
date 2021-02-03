<?php
/**
 * Material utilizado como referência
 * http://devdocs.magento.com/guides/m1x/api/soap/sales/salesOrder/sales_order.list.html
 */

// URL para acesso à API SOAP (Altere para a URL de sua loja)
$proxy = new SoapClient('http://treinamento-jn2.agile.jn2.xyz/api/v2_soap/?wsdl', array('cache_wsdl' => WSDL_CACHE_NONE));

// Informe seu usuário e senha para acessp à API
$session = $proxy->login((object)array('username' => 'meuUsuario', 'apiKey' => 'minhaSenha'));

$result = $proxy->salesOrderList((object)array(
    'sessionId' => $session->result,
    /*
     * Deve-se passar para todas requisições | Para casos sem filtro, passe 'filters' => null
     * Obs: pode-se passar somente um tipo de filtro, ou seja, ou faz a request com 'filter' ou com 'complex_filter'
    */
    'filters' => array(
        'filter' => array( // Para filtros simples
            array(
                'key' => 'status',
                'value' => 'canceled'
            ),
            array(
                'key' => 'status',
                'value' => 'complete'
            ),
            // mais opções de filtro
        ),
        /*'complex_filter' => array( // Opção para filtros "complexos", como busca para range de datas, dentre outros
            array(
                'key' => 'created_at',
                'value' => array('key' => 'from', 'value' => '2017-12-17 00:00:00')
            ),
            array(
                'key' => 'created_at',
                'value' => array('key' => 'to', 'value' => '2017-12-05 12:02:02')
            ),
            // mais opções de filtro
        )*/
    )
));

var_dump($result->result);