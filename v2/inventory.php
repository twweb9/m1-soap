<?php
/**
 * Material utilizado como referência
 * http://devdocs.magento.com/guides/m1x/api/soap/catalogInventory/cataloginventory_stock_item.update.html
 */

// Altere para a URL de sua loja
$proxy = new SoapClient('http://testeapi.agilex.jn2.xyz/api/v2_soap/?wsdl');

// Informe seu usuário e senha para acessp à API
$session = $proxy->login('testejn2', 'teste123123'); 


$result = $proxy->catalogInventoryStockItemUpdate($session, 183, array(
'qty' => '49', 
'is_in_stock' => 1
));

var_dump($result);

/*
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
*/
/** Aqui é só para verificar as mudanças feitas, ou seja, não faz parte do processo de atualização do estoque apenas verifica se as informações foram atualizadas*/
$result = $proxy->catalogInventoryStockItemList($session, array('183', '184'));
var_dump($result);