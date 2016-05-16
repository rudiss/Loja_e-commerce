<?php

require 'LocawebGatewayProcessor.php';

class DescribeLocawebGatewayProcessor extends \PHPSpec\Context
{
  private $usedData = array(
    'interno' => array(
      'meio_pagamento' => 'redecard',
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
	  'nome_titular_cartao' => 'teste',
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
  //Describe __constructor
  function itShouldCreateALocawebGatewayWithCorrectData()
  {
    $formulario = $this->usedData['form'];
    $dados_internos = $this->usedData['interno'];
    $locawebGatewayProcessor = new LocawebGatewayProcessor($dados_internos,$formulario);
    $this->spec($locawebGatewayProcessor->locawebGateway)->should->beAnInstanceOf('LocawebGateway');
    $this->spec($locawebGatewayProcessor->locawebGateway->request()->token)->should->equal('3a5bbed0-50d4-012f-8d73-0026bb5a6240');
    $this->spec($locawebGatewayProcessor->locawebGateway->request()->url)->should->equal('https://api.gatewaylocaweb.com.br/v1/transacao');
  }

  function itShouldbeAbleToAccessFormAndInternalData(){
    $formulario = $this->usedData['form'];
    $dados_internos = $this->usedData['interno'];
    $locawebGatewayProcessor = new LocawebGatewayProcessor($dados_internos,$formulario);
    $this->spec($locawebGatewayProcessor->dados_internos)->should->equal($dados_internos);
    $this->spec($locawebGatewayProcessor->formulario)->should->equal($formulario);
  }

  //Describe preparePayload
  function itShouldPrepareThePayLoad()
  {
    $formulario = $this->usedData['form'];
    $dados_internos = $this->usedData['interno'];
    $locawebGatewayProcessor = new LocawebGatewayProcessor($dados_internos,$formulario);
    $data_node = $locawebGatewayProcessor->locawebGateway->payment();
    $this->spec($data_node->url_retorno)->should->equal('http://www.minha-loja.com.br/confirmacao-pedido.php?id=12345');
    $this->spec($data_node->capturar)->should->equal('true');


    $this->spec($data_node->pedido)->should->equal(
      array(
         'numero' => "12345",
         'total' => "100.00",
         'moeda' => "real",
         'descricao' => "Something shiny!"
      )
    );

    $this->spec($data_node->pagamento)->should->equal(
      array(
       'meio_pagamento' => 'redecard',
       'bandeira' => "visa",
	   'nome_titular_cartao' => 'teste',
       'cartao_numero' => "4012001037141112",
       'cartao_cvv' => "973",
       'parcelas' => "1",
       'tipo_operacao' => "credito_a_vista",
       'cartao_validade' => "082015"
      )
    );

    $this->spec($data_node->comprador)->should->equal(
      array(
        'nome' => "Bruna da silva",
        'documento' => "12345678900",
        'endereco' => "Rua da casa",
        'cep' => "09710240",
        'bairro' => "Centro",
        'numero' => '22',
        'cidade' => "São Paulo",
        'estado' => "SP"
      )
    );
  }

  //Describe preparePayload
  function itShouldReadTheAdressIfItIsAnArrayToo()
  {
    $formulario = $this->usedData['form'];
    $dados_internos = $this->usedData['interno'];
    $formulario['endereco'] = array('foo','bar');
    $locawebGatewayProcessor = new LocawebGatewayProcessor($dados_internos,$formulario);
    $data_node = $locawebGatewayProcessor->locawebGateway->payment();
    $this->spec($data_node->comprador)->should->equal(
      array(
        'nome' => "Bruna da silva",
        'documento' => "12345678900",
        'endereco' => "foobar",
        'cep' => "09710240",
        'bairro' => "Centro",
        'numero' => '22',
        'cidade' => "São Paulo",
        'estado' => "SP"
      )
    );
  }

  //Describe preparePayload
  function itShouldFormatTheTotal()
  {
    $formulario = $this->usedData['form'];
    $dados_internos = $this->usedData['interno'];
    $dados_internos['total'] = '123.45678';
    $locawebGatewayProcessor = new LocawebGatewayProcessor($dados_internos,$formulario);
    $data_node = $locawebGatewayProcessor->locawebGateway->payment();
    $this->spec($data_node->pedido)->should->equal(
      array(
         'numero' => "12345",
         'total' => "123.46",
         'moeda' => "real",
         'descricao' => "Something shiny!"
      )
    );
  }


  function itShouldRaiseExceptionWhenOperationTypeIsNotListed(){
    $formulario = $this->usedData['form'];
    $formulario['tipo_operacao'] = 'foo';
    $dados_internos = $this->usedData['interno'];
    $dados_internos['operacoes_permitidas'] = array('40');

    $this->spec(function() use($dados_internos,$formulario) {
      $foo = new LocawebGatewayProcessor($dados_internos,$formulario);
    })->should->throwException('Exception','Tipo de operação inválida');
  }

  function itShouldNotRaiseExceptionWhenNoOperationTypesAreProvided(){
    $formulario = $this->usedData['form'];
    $formulario['tipo_operacao'] = 'foo';
    $dados_internos = $this->usedData['interno'];
    $dados_internos['operacoes_permitidas'] = NULL;

    $this->spec(function() use($dados_internos,$formulario) {
      $foo = new LocawebGatewayProcessor($dados_internos,$formulario);
    })->shouldNot->throwException('Exception','Tipo de operação inválida');
  }

  function itShouldRaiseExceptionWhenParcelNumberIsNotListed(){
    $formulario = $this->usedData['form'];
    $formulario['parcelas'] = 'foo';
    $dados_internos = $this->usedData['interno'];
    $dados_internos['parcelas_permitidas'] = array('40');

    $this->spec(function() use($dados_internos,$formulario) {
      $foo = new LocawebGatewayProcessor($dados_internos,$formulario);
    })->should->throwException('Exception','Numero de Parcelas inválidas');
  }

  function itShouldNotRaiseExceptionWhenNoParcelAmountLimitAreProvided(){
    $formulario = $this->usedData['form'];
    $formulario['parcelas'] = 'foo';
    $dados_internos = $this->usedData['interno'];
    $dados_internos['parcelas_permitidas'] = NULL;

    $this->spec(function() use($dados_internos,$formulario) {
      $foo = new LocawebGatewayProcessor($dados_internos,$formulario);
    })->shouldNot->throwException('Exception','Numero de Parcelas inválidas');
  }

 function itShouldNotRaiseErrorsWhenFormWithOnlySelectDataIsPassed(){
    $dados_internos = $this->usedData['interno'];
    $formulario = array(
      'parcelas' => '1',
      'tipo_operacao' => 'credito_a_vista'
    );
    $locawebGatewayProcessor = new LocawebGatewayProcessor($dados_internos,$formulario);
    $data_node = $locawebGatewayProcessor->locawebGateway->payment();
  }

  // Getters for array_data (getValueOrNull , getDadosInternos, GetFormulario)
  function itShouldSearchAValueOnAnArray(){
    $test = array('foo' => '3a5bbed0-50d4-012f-8d73-0026bb5a6240');
    $formulario = $this->usedData['form'];
    $dados_internos = $this->usedData['interno'];
    $locawebGatewayProcessor = new LocawebGatewayProcessor($dados_internos,$formulario);
    $this->spec($locawebGatewayProcessor->getValueOrNull('foo',$test))->should->equal('3a5bbed0-50d4-012f-8d73-0026bb5a6240');
  }

  function itShouldReturnDataFromInternalDataArray()
  {
    $formulario = array(
      'parcelas' => '1',
      'tipo_operacao' => 'credito_a_vista'
    );
    $dados_internos = $this->usedData['interno'];
    $dados_internos['foo'] = '3a5bbed0-50d4-012f-8d73-0026bb5a6240';
    $locawebGatewayProcessor = new LocawebGatewayProcessor($dados_internos,$formulario);
    $this->spec($locawebGatewayProcessor->getDadosInternos('foo'))->should->equal('3a5bbed0-50d4-012f-8d73-0026bb5a6240');
  }

  function itShouldReturnDataFromFormDataArray()
  {
     $formulario = array(
      'parcelas' => '1',
      'tipo_operacao' => 'credito_a_vista'
    );
    $dados_internos = $this->usedData['interno'];
    $locawebGatewayProcessor = new LocawebGatewayProcessor($dados_internos,$formulario);
    $this->spec($locawebGatewayProcessor->getFormulario('parcelas'))->should->equal('1');
  }
}
