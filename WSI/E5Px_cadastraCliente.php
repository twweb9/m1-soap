<?php
/**
 * Material utilizado como referência
 * http://devdocs.magento.com/guides/m1x/api/soap/customer/customer.create.html
 */

// URL para acesso à API SOAP
$proxy = new SoapClient('http://treinamento-jn2.agile.jn2.xyz/api/v2_soap/?wsdl', array('cache_wsdl' => WSDL_CACHE_NONE));

// Informe seu usuário e senha para acessp à API
$session = $proxy->login((object)array('username' => 'meuUsuario', 'apiKey' => 'minhaSenha'));

// Requisição com os parâmetros
$result = $proxy->customerCustomerCreate((object)array('sessionId' => $session->result, 'customerData' => ((object)array(
    'email' => 'clientejn2@malinator.com', // Email do cliente
    'firstname' => 'Cliente', // Primeiro nome do cliente
    'lastname' => 'Jn2', // Segundo nome do cliente
    'password' => '123123', // Senha do cliente para acesso
    'website_id' => '1', // ID do website
    'store_id' => '1', // ID da loja | Será sempre 1, caso sua loja não possua múltiplas stores ()
    'group_id' => '1', // ID do grupo de cliente em que será inserido | 0 => Visitante, 1 => Geral, 2 => Atacado, 3 => Varejo
    'dob' => '1992-01-02', // Campo para Dt. Nascimento | Opcional
    'taxvat' => '12345978901', // Campo para CPF/CNPJ | Opcional
    'gender' => '1', // Campo para Gênero | 0 => Feminino, 1 => Masculino | Opcional
))));

var_dump($result->result);
