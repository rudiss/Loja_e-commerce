<?php

require 'LocawebGatewayPayment.php';

class DescribeLocawebGatewayPayment extends \PHPSpec\Context
{
  function itShouldReturnDataInAnArray(){
    $locawebGatewayPayment = new LocawebGatewayPayment;
    $locawebGatewayPayment->pagamento = 'foo';
    $locawebGatewayPayment->comprador = 'bar';
    $locawebGatewayPayment->pedido = 'xyz';
    $locawebGatewayPayment->capturar = 'abc';
    $locawebGatewayPayment->url_retorno = 'def';

    $this->spec($locawebGatewayPayment->toPayload())->should->equal(
      array(
        'pagamento' => 'foo',
        'comprador' => 'bar',
        'pedido' => 'xyz',
        'capturar' => 'abc',
        'url_retorno' => 'def'
      )
    );
  }

  function itShouldReceiveParamsAsArray(){
    $data = array(
      'pagamento' => 'foo',
      'comprador' => 'bar',
      'pedido' => 'xyz',
      'capturar' => 'abc',
      'url_retorno' => 'def'
    );

    $locawebGatewayPayment = new LocawebGatewayPayment($data);
    $this->spec($locawebGatewayPayment->pagamento)->should->equal('foo');
    $this->spec($locawebGatewayPayment->comprador)->should->equal('bar');
    $this->spec($locawebGatewayPayment->pedido)->should->equal('xyz');
    $this->spec($locawebGatewayPayment->capturar)->should->equal('abc');
    $this->spec($locawebGatewayPayment->url_retorno)->should->equal('def');
  }

  function itShouldReturnOnlyDataContainingNodes(){
    #One / None fields
    $locawebGatewayPayment = new LocawebGatewayPayment();
    $this->spec($locawebGatewayPayment->toPayload())->should->equal(array());
    $locawebGatewayPayment->pagamento = 'foo';
    $this->spec($locawebGatewayPayment->toPayload())->should->equal(array('pagamento' => 'foo'));

    #Only 3 fields
    $locawebGatewayPayment->comprador = 'bar';
    $locawebGatewayPayment->pedido = 'xyz';

    $this->spec($locawebGatewayPayment->toPayload())->should->equal(array(
      'pagamento' => 'foo',
      'comprador' => 'bar',
      'pedido' => 'xyz'
    ));

    #All 5 fields
    $locawebGatewayPayment->capturar = 'abc';
    $locawebGatewayPayment->url_retorno = 'def';

    $this->spec($locawebGatewayPayment->toPayload())->should->equal(array(
      'pagamento' => 'foo',
      'comprador' => 'bar',
      'pedido' => 'xyz',
      'capturar' => 'abc',
      'url_retorno' => 'def'
    ));
  }

  function itShouldNotRaiseErrorWhenReceivingEmptyParamsAsArray(){
    $data = array();
    $locawebGatewayPayment = new LocawebGatewayPayment($data);
  }
}
