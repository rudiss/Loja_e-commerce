<?php
require "../LocawebGatewayProcessor.php";

LocawebGatewayConfig::setEnvironment('sandbox');
LocawebGatewayConfig::setToken('3a5bbed0-50d4-012f-8d73-0026bb5a6240');

echo "Executando criar:";
$resposta = LocawebGateway::criar( array(
  'url_retorno' => 'http://www.minha-loja.com.br/confirmacao-pedido.php?id=12345',
  'capturar' => 'true',
  'pedido' => array(
    'numero' => "123",
    'total' => "100.00",
    'moeda' => "real",
    'descricao' => "My Camaro car!"
  ),
  'pagamento' => array(
    'meio_pagamento' => 'redecard_ws',
    'bandeira' => "visa",
	'nome_titular_cartao' => "teste",
    'cartao_numero' => "4012001037141112",
    'cartao_cvv' => "973",
    'parcelas' => "1",
    'tipo_operacao' => "credito_a_vista",
    'cartao_validade' => "082015"
  ),
  'comprador' => array(
    'nome' => "Bruna da Silva",
    'documento' => "27836038881",
    'endereco' => "Rua da Casa",
    'numero' => "1",
    'cep' => "09710240",
    'bairro' => "Centro",
    'cidade' => "São Paulo",
    'estado' => "SP"
  )
))->sendRequest();
var_dump($resposta);
echo "Executando capturar:";
$resposta = LocawebGateway::capturar(17)->sendRequest();
var_dump($resposta);
echo "Executando cancelar:";
$resposta = LocawebGateway::cancelar(17)->sendRequest();
var_dump($resposta);
echo "Executando consultar:";
$resposta = LocawebGateway::consultar(17)->sendRequest();
var_dump($resposta);

echo "==================================================================\n";

echo "Executando via form:";
#Para caso de envio via formulário.
$usedData = array(
  'interno' => array(
    'meio_pagamento' => 'redecard_ws',
    'url_retorno' => 'http://www.minha-loja.com.br/confirmacao-pedido.php?id=12345',
    'capturar_automaticamente' => 'true',
    'numero_pedido' => '12345',
    'total' => '100.00',
    'moeda' => 'real',
    'descricao' => 'Something shiny!',
    'operacoes_permitidas' => array('credito_a_vista'),
    'parcelas_permitidas' => array('1')
  ),
  'form' => array(
    'bandeira' => 'visa' ,
    'cartao_numero' => '4012001037141112' ,
    'numero' => '22',
    'cartao_cvv' => '973' ,
    'cartao_validade' => '08-2015' ,
    'tipo_operacao' => 'credito_a_vista' ,
    'parcelas' => '1' ,
    'nome' => 'Bruna da silva' ,
    'documento' => '123.456.789-00' ,
    'endereco' => 'Rua da casa' ,
    'cep' => '09710-240' ,
    'bairro' => 'Centro' ,
    'cidade' => 'São Paulo' ,
    'estado' => 'SP'
  )
);

$processor = new LocawebGatewayProcessor($usedData['interno'],$usedData['form']);
$resposta = $processor->locawebGateway->sendRequest();
var_dump($resposta);
