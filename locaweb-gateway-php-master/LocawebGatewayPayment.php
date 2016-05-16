<?php

class LocawebGatewayPayment
{
  # Atributo informando a url de retorno para a loja após a finalização
  # do processo de pagamento
  # 'url_retorno' => 'http://www.minha-loja.com.br/confirmacao-pedido.php?id=12345'
  public $url_retorno = '';

  # Atributo que informa se deverá ocorrer a captura automática.
  # Valido apenas para operações via Cielo e Redecard.
  # 'capturar' => 'true'
  public $capturar = '';

  # Campo contendo os detalhes do pedido a ser enviado:
  #  'pedido' => array(
  #     'numero' => "123",
  #     'total' => "100.00",
  #     'moeda' => "real",
  #     'descricao' => "My Camaro car!"
  #   )
  public $pedido = '';

  # Atributo contendo as informações sobre o pagamento:
  #  'pagamento' => array(
  #    'meio_pagamento' => 'redecard' # Nesse campo se determina o convenio utilizado.
  #    'bandeira' => "visa",
  #	   'nome_titular_cartao' => "teste", 	
  #    'cartao_numero' => "4012001037141112",
  #    'cartao_cvv' => "973",
  #    'parcelas' => "1",
  #    'tipo_operacao' => "credito_a_vista",
  #    'cartao_validade' => "082015"
  #  )
  public $pagamento = '';

  # Atributo contendo as informações sobre o comprador:
  #  'comprador' => array(
  #     'nome' => "Bruna da Silva",
  #     'documento' => "27836038881",
  #     'endereco' => "Rua da Casa",
  #     'numero' => "23",
  #     'cep' => "09710240",
  #     'bairro' => "Centro",
  #     'cidade' => "São Paulo",
  #     'estado' => "SP"
  #   )
  public $comprador = '';

  public function __construct(Array $data=array())
  {
    extract($data);
    if (isset($comprador))
      $this->comprador = $comprador;
    if (isset($pedido))
      $this->pedido = $pedido;
    if (isset($pagamento))
      $this->pagamento = $pagamento;
    if (isset($capturar))
      $this->capturar = $capturar;
    if (isset($url_retorno))
      $this->url_retorno = $url_retorno;
  }

  public function toPayload(){
    $payload = array();
    $this->setArrayItemIfValueIsPresent($payload,'pagamento',$this->pagamento);
    $this->setArrayItemIfValueIsPresent($payload,'comprador',$this->comprador);
    $this->setArrayItemIfValueIsPresent($payload,'pedido',$this->pedido);
    $this->setArrayItemIfValueIsPresent($payload,'capturar',$this->capturar);
    $this->setArrayItemIfValueIsPresent($payload,'url_retorno',$this->url_retorno);
    return $payload;
  }

  private function setArrayItemIfValueIsPresent(&$array, $index, $value){
    if(isset($value) && !empty($value)){
      $array[ $index ] = $value;
      return true;
    }
    return false;
  }
}
