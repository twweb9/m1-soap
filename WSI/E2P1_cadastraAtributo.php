<?php
/**
 * Material utilizado como referência
 * http://devdocs.magento.com/guides/m1x/api/soap/catalog/catalogProductAttribute/product_attribute.create.html
 */

// Informe seu usuário e senha para acessp à API
$proxy = new SoapClient('http://treinamento-jn2.agile.jn2.xyz/api/v2_soap/?wsdl', array('cache_wsdl' => WSDL_CACHE_NONE));

$data = array(
    "attribute_code" => "myAttribute",
    "frontend_input" => "Meu Teste de Atributo",
    "scope" => "1", // Scopo do atributo | Valores possíveis ['store', 'website', 'global']
    "default_value" => "1", // Valor default do atributo
    "is_unique" => 0, // Define se o atributo é único
    "is_required" => 0, // Se é requerido
    "apply_to" => array("simple"), // Valor vázio aplica para todos, se não, passe array com valores | Possíveis valores ['simple', 'grouped', 'configurable', 'virtual', 'bundle', 'downloadable', 'giftcard']
    "is_configurable" => 0, // Define se pode ser usado para produtos configuráveis
    "is_searchable" => 0, // Define se pode ser usado na busca rápida de produtos
    "is_visible_in_advanced_search" => 0, // Define se pode ser usado na busca avançada de produtos
    "is_comparable" => 0,// Define se atributo pode ser comparado a outros
    "is_used_for_promo_rules" => 0, // Define se pode ser usado em regras de promoção
    "is_visible_on_front" => 0, // Define se é visível no frontend
    "used_in_product_listing" => 0, // Define se é usado na listagem de produtos
    "additional_fields" => array(), // Campos adicionais
    "frontend_label" => array(array("store_id" => "0", "label" => "some label"))
);

// Requisição com os parâmetros
$result = $proxy->catalogProductAttributeCreate(array("sessionId" => $session->result, "data" => $data));

var_dump($result->result);
