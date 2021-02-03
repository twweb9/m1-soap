<?php
/**
 * Material utilizado como referência
 * http://devdocs.magento.com/guides/m1x/api/soap/catalogInventory/cataloginventory_stock_item.update.html
 */

// Altere para a URL de sua loja
$proxy = new SoapClient('http://treinamento-jn2.agile.jn2.xyz/api/v2_soap/?wsdl', array('cache_wsdl' => WSDL_CACHE_NONE));

// Informe seu usuário e senha para acessp à API
$session = $proxy->login((object)array('username' => 'meuUser', 'apiKey' => 'minhaSenha'));

// Array de exemplo com produtos e atributos à serem atualizados
$productsInfo = array(
    'PRODUTO-TESTE' => array( // A chave pode ser tanto o ID do produto ou a SKU
        'qty' => '20',
        'is_in_stock' => 0
    ),
    '153' => array( // A chave pode ser tanto o ID do produto ou a SKU
        'qty' => '335',
        'is_in_stock' => 1
    ),
);

// Passa por cada produto e atualiza os dados no Magento
foreach ($productsInfo as $sku => $stockInfo) {

    // Requisição com os parâmetros
    $result = $proxy->catalogInventoryStockItemUpdate(array(
            'sessionId' => $session->result,
            'productId' => $sku, // Pode ser tanto o ID do produto quanto a SKU
            'data' => $stockInfo // Array com um ou mais produtos e suas informações de estoque
        )
    );

}

/** Aqui é só para verificar as mudanças feitas, ou seja, não faz parte do processo de atualização do estoque */
$result = $proxy->catalogInventoryStockItemList((object)array('sessionId' => $session->result,
    'productIds' => array(
        'PRODUTO-TESTE',
        '153')
));

var_dump($result->result);
