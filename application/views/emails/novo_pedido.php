<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Fox Games.</title>
	</head>
	<body>
		<h2>Fox Games.</h2>
		<h3>Pedido <?php echo $pedido['numero'] ?></h3>
        <h4>Dados do cliente</h4>
        <?php
			echo "Nome: " . $comprador['nome'] . "<br/>";
			echo "CPF: " . $comprador['documento'] . "<br/>";
			echo "Endereço: " . $comprador['endereco'] . "<br/>";
			echo "Número: " . $comprador['numero'] . "<br/>";
			echo "Cep: " . $comprador['cep'] . "<br/>";
			echo "Bairro: " . $comprador['bairro'] . "<br/>";
			echo "Cidade: " . $comprador['cidade'] . "<br/>";
			echo "Estado: " . $comprador['estado'] . "<br/>";
		?>
        <h4>Dados do pagamento</h4>
        <?php
			echo "ID: " . $transacao->transacao->id . "<br/>";
			echo "Status: " . $transacao->transacao->status . "<br/>";
			echo "Total: " . reais($transacao->transacao->total) . "<br/>";
		?>
        <p>Obrigado por comprar conosco. Este e-mail foi
        encaminhado automaticamente pelo nosso sistema em <?php echo date("d/m/Y H:i:s") ?></p>
	</body>
</html>