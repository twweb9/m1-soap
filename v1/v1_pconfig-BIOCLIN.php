<?php

//SOAP V1
$client = new SoapClient('http://bioclin.agilex.jn2.xyz/api/soap/?wsdl');

$session = $client->login('jn2', '234yhuhwns33'); //chave definida no admin

/* grupo de atributos default*/
$attr_g = 15;

/*criando o configuravel primeiro*/

$client->call($session, 'catalog_product.create', array('configurable', $attr_g, 'TESTEK111', array(
	'categories' => array(2,7,44,87),
	'websites' => array(1),
	'name' => 'TESTE CAPACIDADE LIGADORA DE FERRO AUTOMAÇÃO - K111',
	'description' => '<h2><strong> CARACTERÍSTICAS </strong></h2><p><span style="font-family: helvetica;"> Tipos de amostras: soro e plasma </span></p>...',
	'short_description' => '<p><b>Finalidade:</b></p><p>Determinação Quantitativa da Capaci...',
	'weight' => '0.18',
	'status' => '1', // 1 => 'Habilitado', 2 => 'Desabilitado'
	'visibility' => '4', // 1 => 'Not Visible Individually', 2 => 'Catalog', 3 => 'Search', 4 => 'Catalog, Search'
	'price' => '208.7',
	'meta_title' => 'CAPACIDADE LIGADORA DE FERRO AUTOMAÇÃO - K111',
	'meta_description' => '<p><b>Finalidade:</b></p><p>Determinação Quantitativa da Capaci...',
	'guest_hide_price' => 1
)));
/***** determinando atributos configuraveis *****/
$atributos_conf = array('dedicados'); //Kit
$result = $client->call($session, 'catalog_product_configurable.setConfigurableAttributes', array('TESTEK111', array('dedicados')));


/* criando 2 produtos simples que irao para o configuravel */



$client->call($session, 'catalog_product.create', array('simple', $attr_g, 'TESTEK111-2', array(
	'categories' => array(2,87,44,7),
	'websites' => array(1),
	'name' => 'TESTE CAPACIDADE LIGADORA DE FERRO AUTOMAÇÃO - K111-2',
	'weight' => '0.18',
	'status' => '1',// 1 => 'Habilitado', 2 => 'Desabilitado'
	'visibility' => '1', // 1 => 'Not Visible Individually', 2 => 'Catalog', 3 => 'Search', 4 => 'Catalog, Search'
	'price' => '208.7',
	'guest_hide_price' => 1,
	/*'additional_attributes' => array( 
		'single_data' => array(
			array(
				'key' => 62,
				'value' => 'Kit Padrão'
			)
		)
	) conforme informei na segunda, o atributo eh associado diretamente */
	'dedicados' => 62
)));



$client->call($session, 'catalog_product.create', array('simple', $attr_g, 'TESTEK111-7.3', array(
	'categories' => array(2,87,44,7),
	'websites' => array(1),
	'name' => 'TESTE CAPACIDADE LIGADORA DE FERRO AUTOMAÇÃO (BIO 800) - K111-7.3',
	'weight' => '0.218',
	'status' => '1',// 1 => 'Habilitado', 2 => 'Desabilitado'
	'visibility' => '1', // 1 => 'Not Visible Individually', 2 => 'Catalog', 3 => 'Search', 4 => 'Catalog, Search'
	'price' => '448',
	'guest_hide_price' => 1,
	/*'additional_attributes' => array(
		'single_data' => array(
			array(
				'key' => 64,
				'value' => 'Bio 800'
			)
		)
	)conforme informei na segunda, o atributo eh associado diretamente */
	'dedicados' => 64
)));

/* associando os simples ao configuravel */

$client->call($session, 'catalog_product_configurable.associateSimpleChildren', array('TESTEK111', array('TESTEK111-2','TESTEK111-7.3')));


var_dump ($result); //retorna a string 'success' ou a exception relacionada

