<?php

require 'LocawebGatewayPayment.php';
require 'LocawebGatewayRequest.php';
require 'LocawebGatewayConfig.inc.php';

class LocawebGateway
{
  const SANDBOX_URL = "https://homologacao.superpay.com.br/superpay/v1/transacao/";
  const PRODUCTION_URL = "https://superpay2.superpay.com.br/checkout/v1/transacao/";

  public $request_url_append = '';

  function __construct()
  {
    $this->request()->token = LocawebGatewayConfig::getToken();
    $this->request()->url = $this->UrlForEnv(LocawebGatewayConfig::getEnvironment());
  }

  function UrlForEnv($environment)
  {
    if($environment == "sandbox"){
      return self::SANDBOX_URL;
    } else {
      return self::PRODUCTION_URL;
    }
  }

  static public function criar($data=array())
  {
    $gateway = new self;
    $gateway->_payment = new LocawebGatewayPayment($data);
    return $gateway;
  }

  static public function capturar($id=null)
  {
    $gateway = new self;
    $gateway->request_url_append .= '/'.$id.'/capturar';
    return $gateway;
  }

  static public function cancelar($id=null)
  {
    $gateway = new self;
    $gateway->request_url_append .= '/'.$id.'/estornar';
    return $gateway;
  }

  static public function consultar($id=null)
  {
    $gateway = new self;
    $gateway->request()->httpMethod = 'get';
    $gateway->request_url_append .= '/'.$id;
    return $gateway;
  }

  public function payment()
  {
    if(empty($this->_payment)){
      $this->_payment = new LocawebGatewayPayment;
    }
    return $this->_payment;
  }

  public function request()
  {
    if(empty($this->_request)){
      $this->_request = new LocawebGatewayRequest;
    }
    return $this->_request;
  }

  public function sendRequest()
  {
    $this->request()->url .= $this->request_url_append;
    $this->request()->payload = $this->payment()->toPayload();
    return $this->request()->execute();
  }
}
