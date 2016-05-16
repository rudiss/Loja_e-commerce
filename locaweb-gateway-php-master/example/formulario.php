<?php
// Seta dados internos , na sua aplicação esses dados devem ser preenchidos pelo seu sistema.
// O token e a url , devem ser configurados no inc.
//
require '../LocawebGatewayProcessor.php';

// Esses dados terão que vir de sua aplicação.
$dados_internos = array(
  'meio_pagamento' => 'redecard_ws',
  'url_retorno' => 'http://www.minha-loja.com.br/confirmacao-pedido.php?id=12345',
  'capturar_automaticamente' => 'true',
  'numero_pedido' => '12345',
  'total' => '100.00',
  'moeda' => 'real',
  'descricao' => 'Something shiny!',
  'operacoes_permitidas' => array('credito_a_vista'),
  'parcelas_permitidas' => array('1')
);

// Captura dados do formulario.
$formulario = $_POST['formulario'];

########### DESSE PONTO EM DIANTE OCORRE O PROCESSAMENTO. #############

// Instancia o processador de formulario.
$processor = new LocawebGatewayProcessor($dados_internos,$formulario);

// Enviar requisição.
$requisicao = $processor->locawebGateway->sendRequest();

if(is_null($requisicao)){
  die('Falha ao tentar se comunicar com o gateway , a url está correta? url atual: '.$dados_internos['url']);
}

// Verifica se existe uma url de retorno, se existir acessa a url.
if (!is_null($requisicao->transacao->url_acesso))
{
  // Verifica se é boleto , se for exibe ele , caso contrario redireciona usuario.
  if($formulario['meio_pagamento']=='boleto'){
    print '<p><img src="'.$requisicao->transacao->url_acesso.'">';
  } else {
    header("HTTP/1.1 301 Moved Permanently",true );
    header("Location: ".$requisicao->transacao->url_acesso);
    header("Cache-Control: no-cache, must-revalidate");
    exit;
  }
}

// Notifica se houve erro
if(!is_null($requisicao->transacao->erro))
  print 'Ocorreu um erro: '.$requisicao->transacao->erro->mensagem.'<br>';

// Notifica se a requisição teve sucesso.
if(!is_null($requisicao->transacao->id))
  print 'Transacao Executada com sucesso.<br>';

// Imprime o retorno da requisição já parseado para fins de informação.
print '<p>Debug Info:<pre>';
var_dump($requisicao);
print '</pre></p>';
?>
