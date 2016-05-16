# Locaweb Gateway

## Instalação
    pear config-set auto_discover 1
    pear channel-discover locaweb.github.com/pear
    pear install locaweb/LocawebGateway-beta

## Configuração
Configure o LocawebGatewayConfig, ele só pode ser configurado uma vez!  ex.:

    LocawebGatewayConfig::setEnvironment("sandbox");
    LocawebGatewayConfig::setToken("3a5bbed0-50d4-012f-8d73-0026bb5a6240");

## Para utilizar diretamente a API.
    echo "Executando criar:";
    $resposta = LocawebGateway::criar( array(
      'url_retorno' => 'http://www.minha-loja.com.br/confirmacao-pedido.php?id=12345',
      'capturar' => 'true',
      'pedido' => array(
        'numero' => "123",
        'total' => "100.00",
        'moeda' => "real",
        'descricao' => "Cylon toaster!"
      ),
      'pagamento' => array(
        'meio_pagamento' => 'redecard_ws',
        'bandeira' => "visa",
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

## Para utilizar a API com envio via formulário.
    echo "Executando via form:";
    $usedData = array(
      'interno' => array(
        'meio_pagamento' => 'redecard_ws',
        'url_retorno' => 'http://www.minha-loja.com.br/confirmacao-pedido.php?id=12345',
        'capturar_automaticamente' => 'true',
        'numero_pedido' => '12345',
        'total' => '100.00',
        'moeda' => 'real',
        'descricao' => 'Talking about toasts , I will have a donut.',
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

## Exemplos
  Dentro da pasta do plugin , existe uma pasta chamada "example" , que contem 3 arquivos:
- chamadas_diretas.php
- formulario.html
- formulario.php

O Arquivo chamadas_diretas.php possui 1 exemplo de cada operação fornecida pelo plugin , sendo executadas diretamente.
Já os 2 arquivos de formulario possuem um exemplo de como captar dados utilizando um formulario e enviar eles para o gateway.

## Documentação

[Documentação do Gateway de Pagamentos Locaweb](http://docs.gatewaylocaweb.com.br)

