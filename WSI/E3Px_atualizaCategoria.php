<?php
/**
 * Material utilizado como referência
 * http://devdocs.magento.com/guides/m1x/api/soap/catalog/catalogCategory/catalog_category.update.html
 */

// URL para acesso à API SOAP (Altere para a URL de sua loja)
$proxy = new SoapClient('http://treinamento-jn2.agile.jn2.xyz/api/v2_soap/?wsdl', array('cache_wsdl' => WSDL_CACHE_NONE));

// Informe seu usuário e senha para acessp à API
$session = $proxy->login((object)array('username' => 'meuUser', 'apiKey' => 'minhaSenha'));

// Requisição com os parâmetros
$result = $proxy->catalogCategoryUpdate(
    (object)array(
        'sessionId' => $session->result,
        'categoryId' => '52',
        'categoryData' => ((object)array(
            'name' => 'Teste 2000', // Nome da categoria
            'is_active' => '1', // Informa se a categoria está ativa | 1 => Sim, 0 => Não
            'description' => 'Teste de categoria', // Descrição da categoria | Opcional
            'available_sort_by' => array('position'), // Ordenações disponíveis para o cliente na tela de categoria
            'default_sort_by' => 'position', // Ordernar por campo escolhido (padrão)
            'include_in_menu' => '1', // Exibir no menu do site | 1 => Sim, 0 => Não
            'url_key' => 'url-key', // URL para navegar até a categoria no site
            'is_anchor' => 1 // Este campo é obrigatório | Se a categoria estiver setada como "true" para âncora
            // e este campo for OMITIDO ou o valor for enviado como vazio, o valor de âncora será alterado para "false"
        ))
    )
);

var_dump($result->result);
