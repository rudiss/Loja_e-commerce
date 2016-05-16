<?php
require_once('SimpleRestClient.php');

class LocawebGatewayRequest
{
  // Qual o token do cliente a ser utilizado
  public $token = '';

  // Dados a serem enviados
  public $payload = '';

  // Url do seu webservice da locaweb
  public $url = '';

  // RestClient to be used
  private $_restClient;

  // Formato do envio
  public $httpMethod = 'post';

  // Return the restclient initialized to common requests.
  protected function _buildRestClient()
  {
    return new SimpleRestClient($arquivo_certificado=null,$arquivo_key=null, $senha=null,
      $user_agent="LocawebPhpPlugin (SimpleRestClient/Curl)", $options=null);
  }

  public function __construct($client = null)
  {
    if ($client == null)
      $client = $this->_buildRestClient();

    $this->setRestClient($client);
  }

  public function dataToBeEncoded()
  {
    return array_filter(array(
      'token' => $this->token,
      'transacao' => $this->payload
    ));
  }

  // Builds the JSON meant to be sent.
  public function buildJSON()
  {
    return json_encode($this->dataToBeEncoded());
  }

  public function buildParams()
  {
    $request_url = '';
    if(count($this->dataToBeEncoded())>0)
    {
      $request_url .= '?';
      $request_url .= http_build_query($this->dataToBeEncoded());
    }

    return $request_url;
  }

  // Sends the data to the current url.
  public function execute()
  {
    if($this->httpMethod == 'post')
      $response = $this->post($this->buildJSON());
    else
      $response = $this->get($this->buildParams());

    return json_decode($response);
  }

  // Executes the get action.
  public function get($data)
  {
    $request_url = $this->url;
    $request_url .= $data;
    $restclient = $this->_restClient;
    $restclient->getWebRequest($request_url);
    return $restclient->getWebResponse();
  }

  // Executes the post action.
  public function post($data)
  {
    $restclient = $this->_restClient;
    $restclient->postWebRequest($this->url , $data);
    return $restclient->getWebResponse();
  }

  // Allow setting a different restClient.
  private function setRestClient($client)
  {
    $this->_restClient =  $client;
  }
  // Allow getting the restClient.

  public function getRestClient()
  {
    return $this->_restClient;
  }
}
