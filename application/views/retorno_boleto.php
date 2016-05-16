<?php
if($transacao->transacao->erro){
	//print_r($transacao);
	echo "<div class='row-fluid'>" .
			"<div class=span12>" .
				"<p>Houve um erro ao processar o pagamento, a seguinte mensagem foi retornada pelo gateway de pagamentos.</p>" .
				heading("Código do erro: " . $transacao->transacao->erro->codigo,4) .
				heading("Mensagem da operadora: " . $transacao->transacao->erro->mensagem,4) .
			"</div>" .
		"</div>";
}
else{
	echo "<div class='row-fluid'>" .
			"<div class=span12>" .
				heading("Pedido: ".$transacao->transacao->numero_pedido,4) .
				"<p>Seu boleto bancário foi gerado corretamente e pode ser acessado no seguinte link.</p>" .
				anchor($transacao->transacao->url_acesso,"CLIQUE AQUI PARA IMPRIMIR O BOLETO",array('target'=>'_blank')) .
				heading("Status: " . ucfirst(str_replace("_"," ",$transacao->transacao->status)) ,5) .
				heading("Valor: ". reais($transacao->transacao->total),5) .
				heading("ID da transação: ". $transacao->transacao->id,5) .
			"</div>" .
		"</div>";
}