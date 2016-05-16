<?php

require 'LocawebGateway.php';

class DescribeLocawebGateway extends \PHPSpec\Context
{
  //Describe __constructor
  function itShouldReadFromAnInc()
  {
    $locawebGatewayPagamento = new LocawebGateway;
    $this->spec($locawebGatewayPagamento->request()->token)->should->equal('3a5bbed0-50d4-012f-8d73-0026bb5a6240');
    $this->spec($locawebGatewayPagamento->request()->url)->should->equal('https://api.gatewaylocaweb.com.br/v1/transacao');
  }

  function itShouldSetConfigOnlyOnce(){
    LocawebGatewayConfig::setEnvironment("sandbox");
    LocawebGatewayConfig::setToken("3a5bbed0-50d4-012f-8d73-0026bb5a6241");

    $locawebGatewayPagamento = new LocawebGateway;
    $this->spec($locawebGatewayPagamento->request()->token)->should->equal('3a5bbed0-50d4-012f-8d73-0026bb5a6241');
    $this->spec($locawebGatewayPagamento->request()->url)->should->equal('https://api-sandbox.gatewaylocaweb.com.br/v1/transacao');

    LocawebGatewayConfig::setEnvironment("production");
    LocawebGatewayConfig::setToken("3a5bbed0-50d4-012f-8d73-0026bb5a6240");
    $locawebGatewayPagamento = new LocawebGateway;
    $this->spec($locawebGatewayPagamento->request()->token)->should->equal('3a5bbed0-50d4-012f-8d73-0026bb5a6241');
    $this->spec($locawebGatewayPagamento->request()->url)->should->equal('https://api-sandbox.gatewaylocaweb.com.br/v1/transacao');
  }

  //Describe Payment
  function itShouldHaveAPayment()
  {
    $locawebGatewayPagamento = $this->spec(new LocawebGateway);
    $locawebGatewayPagamento->payment()->should->beAnInstanceOf('LocawebGatewayPayment');
  }

  //Describe Request
  function itShouldHaveARequest()
  {
    $locawebGatewayPagamento = $this->spec(new LocawebGateway);
    $locawebGatewayPagamento->request()->should->beAnInstanceOf('LocawebGatewayRequest');
  }

  //Describe sendRequest
  function itShouldSendDataFormattedAsPayload(){
    $locawebGatewayPagamento = new LocawebGateway;
    $locawebGatewayPagamento->request()->url = "http://localhost:9000/v1/transacao";
    $payment_mock = Mockery::mock('LocawebGatewayPayment');
    $payment_mock->shouldReceive('toPayload')->once()->andReturn('3a5bbed0-50d4-012f-8d73-0026bb5a6241');

    $locawebGatewayPagamento->_payment = $payment_mock;
    $locawebGatewayPagamento->sendRequest();
    $this->spec($locawebGatewayPagamento->request()->payload)->should->equal('3a5bbed0-50d4-012f-8d73-0026bb5a6241');
  }

  function itShouldSendData(){
    $locawebGatewayPagamento = new LocawebGateway;
    $request_mock = Mockery::mock('LocawebGatewayRequest');
    $request_mock->shouldReceive('execute')->once()->andReturn('https://api-sandbox.gatewaylocaweb.com.br/v1/transacao');

    $locawebGatewayPagamento->_request = $request_mock;
    $this->spec($locawebGatewayPagamento->sendRequest())->should->equal('https://api-sandbox.gatewaylocaweb.com.br/v1/transacao');
  }

  // Describe criar
  function itShouldInstanceAnCreateTransactionUsingClassData(){
    $locawebGateway = LocawebGateway::criar();
    $this->spec($locawebGateway)->should->beAnInstanceOf('LocawebGateway');
    $this->spec($locawebGateway->request()->token)->should->equal('3a5bbed0-50d4-012f-8d73-0026bb5a6241');
    $this->spec($locawebGateway->request()->url)->should->equal('https://api-sandbox.gatewaylocaweb.com.br/v1/transacao');
  }

  //Describe capturar
  function itShouldInstanceAnCaptureTransactionUsingClassData(){
    $locawebGateway = LocawebGateway::capturar(10);
    $url = $locawebGateway->request()->url.$locawebGateway->request_url_append;
    $this->spec($locawebGateway)->should->beAnInstanceOf('LocawebGateway');
    $this->spec($url)->should->equal('https://api-sandbox.gatewaylocaweb.com.br/v1/transacao/10/capturar');
    $this->spec($locawebGateway->request()->buildJSON())->should->equal('{"token":"3a5bbed0-50d4-012f-8d73-0026bb5a6241"}');
  }

  //Describe cancelar
  function itShouldInstanceAnCancelTransactionUsingClassData(){
    $locawebGateway = LocawebGateway::cancelar(10);
    $url = $locawebGateway->request()->url.$locawebGateway->request_url_append;
    $this->spec($locawebGateway)->should->beAnInstanceOf('LocawebGateway');
    $this->spec($url)->should->equal('https://api-sandbox.gatewaylocaweb.com.br/v1/transacao/10/estornar');
    $this->spec($locawebGateway->request()->buildJSON())->should->equal('{"token":"3a5bbed0-50d4-012f-8d73-0026bb5a6241"}');
  }

  //Describe consultar
  function itShouldInstanceAnShowTransactionUsingClassData(){
    $locawebGateway = LocawebGateway::consultar(10);
    $url = $locawebGateway->request()->url.$locawebGateway->request_url_append;
    $this->spec($locawebGateway)->should->beAnInstanceOf('LocawebGateway');
    $this->spec($url)->should->equal('https://api-sandbox.gatewaylocaweb.com.br/v1/transacao/10');
    $this->spec($locawebGateway->request()->httpMethod)->should->equal('get');
    $this->spec($locawebGateway->request()->buildParams())->should->equal('?token=3a5bbed0-50d4-012f-8d73-0026bb5a6241');
  }
}
