<?php
/**
 * Material utilizado como referência
 * http://devdocs.magento.com/guides/m1x/api/soap/sales/salesOrder/sales_order.list.html
 */


//API V2
/**
 * Material utilizado como referência
 * http://devdocs.magento.com/guides/m1x/api/soap/sales/salesOrder/sales_order.list.html
 */

// URL para acesso à API SOAP (Altere para a URL de sua loja)
$client = new SoapClient('http://SUALOJA.agilex.jn2.xyz/api/v2_soap/?wsdl');

// If some stuff requires API authentication,
// then get a session token
$session = $client->login('username', 'apikey');


$filter = array('filter' => array(array('key' => 'state', 'value' => 'complete')));


$result = $client->salesOrderList($session, $filter);

var_dump ($result);
   





////API V2 + WSICOMPLIANCE

/*
// URL para acesso à API SOAP (Altere para a URL de sua loja)
$client = new SoapClient('http://testeapi.agilex.jn2/api/v2_soap/?wsdl');

// If some stuff requires API authentication,
// then get a session token
$session = $client->login('testejn2', 'teste123123');

$filter = array(array(
    'filters' => array(// Para filtros simples
            array(
                'key' => 'status',
                'value' => 'canceled'
            ),
            array(
                'key' => 'status',
                'value' => 'complete'
            ),
        ),
));
$result = $client->salesOrderList($session, $filter);

    /*
     * Deve-se passar para todas requisições | Para casos sem filtro, passe 'filters' => null
     * Obs: pode-se passar somente um tipo de filtro, ou seja, ou faz a request com 'filter' ou com 'complex_filter'
    */
    /*'filters' => array(
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
        )
    )
));

var_dump($result->result);