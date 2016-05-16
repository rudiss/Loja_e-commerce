<?php
if($transacao->transacao->erro){
	echo "<div class='row-fluid'>" .
		"<div class=span12>" .
		"<p>Houve um erro ao processar o pagamento, a seguinte mensagem foi retornada pela operadora de cartão de crédito.</p>" .
		heading("Código do erro: " . $transacao->transacao->erro->codigo,4) .
		heading("Mensagem da operadora: " . $transacao->transacao->erro->mensagem,4) .
		"</div>" .
	"</div>";
}
else{
	echo "<div class='row-fluid'>" .
		"<div class=span12>" .
			heading("Pedido: ".$transacao->transacao->numero_pedido,4) .
			"<p>Seu pagamento foi processado pela administradora de cartão de crédito com o seguinte status.</p>" .
			heading("Status: " . ucfirst(str_replace("_"," ",$transacao->transacao->status)),5) .
			heading("Valor: ". reais($transacao->transacao->total),5) .
			heading("ID da transação: ". $transacao->transacao->id,5) .
		"</div>" .
	"</div>";
}