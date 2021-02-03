<?php
/**
 * Material utilizado como referência
 * http://devdocs.magento.com/guides/m1x/api/soap/catalog/catalogProduct/catalog_product.update.html
 */

// Altere para a URL de sua loja
$proxy = new SoapClient('http://treinamento-jn2.agile.jn2.xyz/api/v2_soap/?wsdl', array('cache_wsdl' => WSDL_CACHE_NONE));

// Informe seu usuário e senha para acessp à API
$session = $proxy->login((object)array('username' => 'meuUsuario', 'apiKey' => 'minhaSenha'));

//Array de exemplo com produtos e atributos à serem atualizados
$productsInfo = array(
    '634' => array( // Exemplo de busca por SKU (string); declarar campo identifierType com valor de 'product_sku'
        'price' => '29.99',
        'status' => 1
        // Pode incluir mais dados à serem atualizados
    ),
    635 => array( // Exemplo de busca por ID (pode ser string ou integer, desde que o campo identifierType tenha o valor de 'productId')
        'price' => '139.99',
        'name' => 'PRODUTO TESTE 3',
        'stock_data' => array( // Informações sobre atualização de estoque do produto
            'use_config_min_qty' => 0, // Flag para controlar a quantidade mínima de estoque apenas deste produto
            'min_qty' => 20, // Qtd. mínima de produtos para constar em estoque (funciona somente quando use_config_min_qty for true)
            'qty' => 25, // Quantidade em estoque
            'is_in_stock' => 1 // Disponível em estoque | 0 => Esgotado, 1 => Disponível
        )
        // Pode incluir mais dados à serem atualizados
    ),
);

//Passa por cada produto e atualiza os dados no Magento
foreach ($productsInfo as $sku => $itemData) {

    $result = $proxy->catalogProductUpdate((object)array(
        'sessionId' => $session->result,
        'productId' => $sku, // Pode ser tanto o ID do produto quanto a SKU
        'identifierType' => 'productId', // Se for busca por ID, use: productId; se for por SKU, use: product_sku
        'productData' => ((object)$itemData // Array com os atributos que precisam ser atualizados
        ))
    );

}

/** Aqui é só para verificar as mudanças feitas, ou seja, não faz parte do processo de atualização do produto */
###################################################################################################
foreach ($productsInfo as $sku => $itemData) {
    $result = $proxy->catalogProductInfo((object)array('sessionId' => $session->result, 'productId' => $sku));
    var_dump($result->result);
}
###################################################################################################