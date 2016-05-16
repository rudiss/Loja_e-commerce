<?php

require 'LocawebGateway.php';

class LocawebGatewayProcessor
{
  public $locawebGateway;
  public $dados_internos;
  public $formulario;

  public function getFormulario($index){
    return $this->getValueOrNull($index,$this->formulario);
  }

  public function getDadosInternos($index){
    return $this->getValueOrNull($index,$this->dados_internos);
  }

  public function getValueOrNull($index,$haystack){
    if(isset($haystack[$index]) && array_key_exists($index,$haystack)){
      return $haystack[$index];
    }
    return null;
  }

  // Processador que recebe os dados necessários e efetua a requisição ao gateway da locaweb
  // Recebe 2 váriaveis dados internos e os dados do formulários , os internos são informações
  // que devem vir do seu sistema , como por exemplo o numero de um pedido , enquanto os dados
  // do formulário são os enviados pelo usuário no momento da compra, como o nr. do cartão.
  function __construct($dados_internos,$formulario, $gateway = 'LocawebGateway')
  {
    $this->dados_internos = $dados_internos;
    $this->formulario = $formulario;

    $this->locawebGateway = new $gateway;

    // Preparar dados a serem enviados.
    $this->preparePayload();
  }

  public function preparePayload(){

    // Configura a URL que deve ser acessada após o processamento pelo gateway ser efetuado.
    // Exemplo: 'url_retorno' => 'http://www.minha-loja.com.br/confirmacao-pedido.php?id=12345'
    $this->locawebGateway->payment()->url_retorno = $this->getDadosInternos('url_retorno');

    // Configura se a captura deve ocorrer automaticamente
    // Valido apenas para operações via Cielo e Redecard.
    // Exemplo: 'capturar' => 'true'
    $this->locawebGateway->payment()->capturar= $this->getDadosInternos('capturar_automaticamente');

    // Configura os dados relacionados ao pedido.
    // Exemplo: 'pedido' => array(
    //     'numero' => "123",
    //     'total' => "100.00",
    //     'moeda' => "real",
    //     'descricao' => "My Camaro car!"
    //   )
    $this->locawebGateway->payment()->pedido = array(
      'numero' => $this->getDadosInternos('numero_pedido'),
      'total' => sprintf('%.2f', (double) $this->getDadosInternos('total')),
      'moeda' => $this->getDadosInternos('moeda'),
      'descricao' => $this->getDadosInternos('descricao')
    );

    // Atributo contendo as informações sobre o pagamento:
    // Exemplo: 'pagamento' => array(
    //    'bandeira' => "visa",
    //    'cartao_numero' => "4012001037141112",
    //    'cartao_cvv' => "973",
    //    'parcelas' => "1",
    //    'tipo_operacao' => "credito_a_vista",
    //    'cartao_validade' => "082015"
    //  )
    $this->locawebGateway->payment()->pagamento = array(
      'meio_pagamento' => $this->getDadosInternos('meio_pagamento'),
      'bandeira' => $this->getFormulario('bandeira'),
	  'nome_titular_cartao' => $this->getFormulario('nome_titular_cartao'),
      'cartao_numero' => $this->getFormulario('cartao_numero'),
      'cartao_cvv' => $this->getFormulario('cartao_cvv'),
      'cartao_validade' => preg_replace('/[^\d]/','',$this->getFormulario('cartao_validade')) # E.R. para remover tudo que não for numero.
    );

    #Parcelas e tipo de operações são tratados separadamente para confirmar se o usuario escolheu dentro do nivel permitido.
    if(is_array($this->getDadosInternos('parcelas_permitidas')))
      if(in_array($this->getFormulario('parcelas'),$this->getDadosInternos('parcelas_permitidas')))
        $this->locawebGateway->payment()->pagamento['parcelas'] = $this->getFormulario('parcelas');
      else
        throw new Exception('Numero de Parcelas inválidas');

    if(is_array($this->getDadosInternos('operacoes_permitidas')))
      if(in_array($this->getFormulario('tipo_operacao'),$this->getDadosInternos('operacoes_permitidas')))
        $this->locawebGateway->payment()->pagamento['tipo_operacao'] = $this->getFormulario('tipo_operacao');
      else
        throw new Exception('Tipo de operação inválida');

    // Atributo contendo as informações sobre o comprador:
    //  'comprador' => array(
    //     'nome' => "Bruna da Silva",
    //     'documento' => "27836038881",
    //     'endereco' => "Rua da Casa",
    //     'numero' => "1",
    //     'cep' => "09710240",
    //     'bairro' => "Centro",
    //     'cidade' => "São Paulo",
    //     'estado' => "SP"
    if(is_array($this->getFormulario('endereco'))){
      $endereco = implode($this->getFormulario('endereco'));
    } else {
      $endereco = $this->getFormulario('endereco');
    }

    $this->locawebGateway->payment()->comprador = array(
      'nome' => $this->getFormulario('nome'),
      'documento' => preg_replace('/[^\d]/','',$this->getFormulario('documento')),  # E.R. para remover tudo que não for numero.
      'endereco' => $endereco,
      'cep' => preg_replace('/[^\d]/','',$this->getFormulario('cep')), # E.R. para remover tudo que não for numero.
      'bairro' => $this->getFormulario('bairro'),
      'numero' => $this->getFormulario('numero'),
      'cidade' => $this->getFormulario('cidade'),
      'estado' => $this->getFormulario('estado')
    );
  }
}
