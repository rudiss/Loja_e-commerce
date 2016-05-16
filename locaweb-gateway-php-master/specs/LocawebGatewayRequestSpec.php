<?php

require 'LocawebGatewayRequest.php';

class DescribeLocawebGatewayRequest extends \PHPSpec\Context
{
  // Describe url
  function itShouldRespondToUrl(){
    $request = $this->spec(new LocawebGatewayRequest);
    $request->url->should->be('');
  }

  function itShouldBeAbleToChangeUrl(){
    $request = new LocawebGatewayRequest;
    $request->url = 'foo';
    $this->spec($request->url)->should->be('foo');
  }

  // Describe token
  function itShouldRespondToToken(){
    $request = $this->spec(new LocawebGatewayRequest);
    $request->token->should->be('');
  }

  function itShouldBeAbleToChangeToken(){
    $request = new LocawebGatewayRequest;
    $request->token = 'foo';
    $this->spec($request->token)->should->be('foo');
  }

  // Describe payload
  function itShouldRespondToPayload(){
    $request = $this->spec(new LocawebGatewayRequest);
    $request->payload->should->be('');
  }

  function itShouldBeAbleToChangePayload(){
    $request = new LocawebGatewayRequest;
    $request->payload = 'foo';
    $this->spec($request->payload)->should->be('foo');
  }

  // Describe buildJSON
  function itShouldConvertDataToJson(){
    $request = new LocawebGatewayRequest;
    $request->token = 'bar';
    $request->payload = array('bogus' => 'data');
    $this->spec($request->buildJSON())->should->equal('{"token":"bar","transacao":{"bogus":"data"}}');
  }

  // Describe buildParams
  function itShouldConvertDataToParams(){
    $request = new LocawebGatewayRequest;
    $request->token = 'bar';
    $request->payload = 'data';
    $this->spec($request->buildParams())->should->equal('?token=bar&transacao=data');
  }

 // Describe Execute
  function itShouldSendDataToLocawebGateway()
  {
    $mock = Mockery::mock('SimpleRestClient');
    $mock->shouldReceive('postWebRequest');
    $mock->shouldReceive('getWebResponse')->andReturn('{"transacao":{"erro":{"codigo":"001","mensagem":"Credenciais inválidas"}}}');
    $request = new LocawebGatewayRequest($mock);
    $request->url = 'http://whatever:1234/v1/transacao';
    $request->token = 'bar';
    $request->payload = array('bogus' => 'data');
    $this->spec($request->execute()->transacao->erro->codigo)->should->equal('001');
    $this->spec($request->execute()->transacao->erro->mensagem)->should->equal('Credenciais inválidas');
  }

  function itShouldSendDataToLocawebGatewayUsingGetIfSet()
  {
    $mock = Mockery::mock('SimpleRestClient');
    $mock->shouldReceive('getWebRequest')->with('http://whatever:1234/v1/transacao/10?token=bar');
    $mock->shouldReceive('getWebResponse')->andReturn('{"transacao":{"erro":{"codigo":"001","mensagem":"Credenciais inválidas"}}}');

    $request = new LocawebGatewayRequest($mock);
    $request->url = 'http://whatever:1234/v1/transacao/10';
    $request->token = 'bar';
    $request->httpMethod = 'get';
    $this->spec($request->execute()->transacao->erro->codigo)->should->equal('001');
    $this->spec($request->execute()->transacao->erro->mensagem)->should->equal('Credenciais inválidas');
  }


  // Describe Post
  function itShouldPostTheDataToTheSpecifiedUrl()
  {
    $mock = Mockery::mock('SimpleRestClient');
    $mock->shouldReceive('postWebRequest');
    $mock->shouldReceive('getWebResponse')->andReturn('{"foo": "bar"}');

    $request = new LocawebGatewayRequest($mock);

    $request->url = 'http://localhost:3000/v1/transacao';
    $this->spec($request->post('{}'))->should->equal('{"foo": "bar"}');
  }

  // Describe Get
  function itShouldGetTheDataToTheSpecifiedUrl()
  {
    $mock = Mockery::mock('SimpleRestClient');
    $mock->shouldReceive('getWebRequest')->with('http://localhost:3000/v1/transacao/10?token=bar');
    $mock->shouldReceive('getWebResponse')->andReturn('{"foo": "bar"}');

    $request = new LocawebGatewayRequest($mock);

    $request->url = 'http://localhost:3000/v1/transacao/10';
    $encodedData = "?token=bar";
    $this->spec($request->get($encodedData))->should->equal('{"foo": "bar"}');
  }

  // Describe Constructor
  function itShouldSetTheRestClientAtTheConstructor()
  {
    $mock = Mockery::mock('SimpleRestClient');
    $mock->shouldReceive('postWebRequest');
    $mock->shouldReceive('getWebResponse')->andReturn('foo');
    $request = new LocawebGatewayRequest($mock);
    $this->spec($request->post(''))->should->equal('foo');
  }

  function itShouldDefaultTheRestClientAtTheConstructor()
  {
    $request = new LocawebGatewayRequest();
    $this->spec($request->getRestClient())->should->beAnInstanceOf('SimpleRestClient');
  }

  // Describe dataToBeEncoded
  function itShouldReturnAStringWithTheData()
  {
    $request = new LocawebGatewayRequest();
    $request->payload = array('foo' => 'bar');
    $request->token = 'bar';
    $this->spec($request->dataToBeEncoded())->should->equal(
      array("token" => "bar", "transacao" => array('foo' => 'bar'))
    );
  }

  function itShouldOmitEmptyFields()
  {
    $request = new LocawebGatewayRequest();
    $request->token = "bar";
    $this->spec($request->dataToBeEncoded())->should->equal(
      array("token" => "bar")
    );

    $request = new LocawebGatewayRequest();
    $request->payload = array('foo' => 'bar');
    $this->spec($request->dataToBeEncoded())->should->equal(
      array("transacao" => array('foo' => 'bar'))
    );

    $request = new LocawebGatewayRequest();
    $this->spec($request->dataToBeEncoded())->should->equal(array());
  }
}
