<?php
/**
 * Material utilizado como referência
 * http://devdocs.magento.com/guides/m1x/api/soap/catalog/catalogProduct/catalog_product.create.html
 */

// URL para acesso à API SOAP (Altere pahttps://www.farmafam.com.brra a URL de sua loja)
$proxy = new SoapClient('http://treinamento-jn2.agile.jn2.xyz/api/v2_soap?wsdl=1', array('cache_wsdl' => WSDL_CACHE_NONE));

// Informe seu usuário e senha para acessp à API
$session = $proxy->login((object)array('username' => 'meuUsuario', 'apiKey' => 'minhaSenha'));

$result = $proxy->catalogProductCreate((object)array('sessionId' => $session->result,
    'type' => 'simple', // Tipo de produto | Ex.: simples, configurável e etc.
    'set' => '4',
    'sku' => 'ABCDEF', // Sku do produto
    'productData' => ((object)array(
        'categories' => array(2), // Categorias em que está inserido
        'name' => 'PRODUTO-TESTE', // Nome do produto
        'description' => 'PRODUTO-TESTE', // Descrição do produto
        'short_description' => 'PRODUTO-TESTE', // Descrição curta do produto
        'weight' => '0.500', // Peso do produto
        'status' => '1', // Status do produto | 0 => Desabilitado, 1 => Habilitado no site
        'visibility' => '4', // Visibilidade do produto | 0 => Não visível, 1 => Visível na listagem de prod., 3 => Visível em buscas, 4 => Visibilidade total
        'price' => '99.99', // Preço do produto
        'url_key' => 'meu-produto-teste', // Caminho da URL no site
        'additional_attributes' => array(
            array('key' => 'volume_altura', 'value' => 15), // Altura
            array('key' => 'volume_largura', 'value' => 15), // Largura
            array('key' => 'volume_comprimento', 'value' => 35), // Comprimento
        ),
        'stock_data' => array( // Informações sobre estoque do produto
            'use_config_min_qty' => 0, // Flag para controlar a quantidade mínima de estoque apenas deste produto
            'min_qty' => 30, // Qtd. mínima de produtos para constar em estoque (funciona somente quando use_config_min_qty for true)
            'qty' => 50, // Quantidade em estoque
            'is_in_stock' => 1 // Disponível em estoque | 0 => Esgotado, 1 => Disponível
        )
    )))
);

var_dump($result->result);