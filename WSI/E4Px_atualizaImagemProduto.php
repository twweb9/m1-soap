<?php
/**
 * Material utilizado como referência
 * http://devdocs.magento.com/guides/m1x/api/soap/catalog/catalogProductAttributeMedia/catalog_product_attribute_media.update.html
 */

//URL
$proxy = new SoapClient('http://treinamento-jn2.agile.jn2.xyz/api/v2_soap/?wsdl', array('cache_wsdl' => WSDL_CACHE_NONE));

// Informe seu usuário e senha para acessp à API
$session = $proxy->login((object)array('username' => 'meuUsuario', 'apiKey' => 'minhaSenha'));

$file_info = new finfo(FILEINFO_MIME);
$product_image_name = pathinfo($product_image_url, PATHINFO_FILENAME);

$product_image_mime_type = substr($file_info->buffer($product_image_content), 0, strpos($file_info->buffer($product_image_content), ';'));
// File Object to be send via the API
$product_image_file = array('name' => $product_image_name, 'content' => base64_encode($product_image_content), 'mime' => $product_image_mime_type);
// Image deails to be added or created at WMS
$product_image_details = array('file' => $product_image_file, 'types' => array('thumbnail', 'small_image', 'image'), 'exclude' => 0);

//Exemplo para atualizar imagem de um produto
$result = $proxy->catalogProductAttributeMediaUpdate(
    (object)array(
        'sessionId' => $session->result,
        'productId' => '10217', // ID do produto ou código
        //'identifierType' => '',
        'file' => '/i/m/image_10_1_7125_1.jpg', // Nome do arquivo atual
        'data' => ((object)array(
            // Informar apenas quais atributos devem ser atualizados, quando não passado, preserva os valores atuais
            'label' => 'Esmalte XYZ',
            'file' => '/i/m/image_10_1_7091.jpg',
            'position' => '1',
            'remove' => '1',
            'types' => array('small_image', 'image', 'img_hover_product_list', 'thumbnail') //Quando não informado o tipo da imagem, preserva o tipo atual
        ))
    )
);

var_dump($result->result);