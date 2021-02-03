<?php
/**
 * Material utilizado como referência
 * http://devdocs.magento.com/guides/m1x/api/soap/catalog/catalogProductAttributeMedia/catalog_product_attribute_media.create.html
 */

// URL para acesso à API SOAP (Altere para a URL de sua loja)
$proxy = new SoapClient('http://treinamento-jn2.agile.jn2.xyz/api/v2_soap/?wsdl', array('cache_wsdl' => WSDL_CACHE_NONE));

// Informe seu usuário e senha para acessp à API
$session = $proxy->login((object)array('username' => 'meuUsuario', 'apiKey' => 'minhaSenha'));

$result = $proxy->catalogProductAttributeMediaCreate(
    (object)array(
        'sessionId' => $session->result,
        'productId' => 'PRODUTO-TESTE5', // Informar ID do produto ou a SKU
        'data' => (object)array(
            'label' => 'Imagem 1', // Descrição/Nome da Imagem
            'position' => '1', // Ordem de exibição da imagem em relação as outras
            /* O parâmetro "types" define para essa imagem se ela será o padrão em algum destes tipos. Se não passar,
            a imagem será exibida no site, mas não como padrão em algum destes tipos. */
            'types' => array('small_image', 'image', 'img_hover_product_list', 'thumbnail'),
            'exclude' => '0', // Não exibir imagem no site
            'file' => ((object)array(
                // base64 da imagem
                'content' => '/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAIBAQIBAQICAgICAgICAwUDAwMDAwYEBAMFBwYHBwcGBwcICQsJCAgKCAcHCg0KCgsMDAwMBwkODw0MDgsMDAz/2wBDAQICAgMDAwYDAwYMCAcIDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAz/wAARCAAXABcDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwDLooor8XP4DCiiigAooooAKKKKAP/Z',
                'mime' => 'image/png', // Tipo de extensão da imagem
                'name' => 'imagem'// Nome que será salvo no arquivo
            )))
    ));

var_dump($result->result);
