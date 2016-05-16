<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Fox Games.</title>
	</head>
	<body>
		<h2>Fox Games.</h2>
        <h4>Seu pedido foi atualizado</h4>
        <!-- Inserir detalhes do pedido aqui -->
        <!-- Inserir detalhes da entrega aqui -->
        <!-- Inserir itens do pedido aqui -->
		<?php
        $pedidos_status = array(0=>"Novo",1=>"Pagamento confirmado",2=>"Enviado");
        foreach($detalhes as $detalhe){
            echo "<b>Pedido número: </b>" . $detalhe->id . 
            "<b> Data do pedido: </b>" . dataMySQL_to_dataBr($detalhe->data) . 
            "<b> Valor produtos: </b>" . reais($detalhe->produtos) . 
            "<b> Valor do frete: </b>" . reais($detalhe->frete) .
            "<b> Total: </b>" . reais($detalhe->produtos + $detalhe->frete) . 
            "<b> Status: </b>" . $pedidos_status[$detalhe->status] . br() .
            "<b> Comentarios: </b>" . $detalhe->comentarios;
        }
        ?>
        <?php
        echo heading("Endereço para entrega",4);
        foreach($cliente as $cli){
            echo "<b>Para: </b>" . $cli->nome . " " . $cli->sobrenome . br() .
            "<b>Rua: </b>" . $cli->rua . ", <b>Número: </b>" . $cli->numero . ", <b>Bairro: </b>" . $cli->bairro . 
            ", <b>Cidade: </b>" . $cli->cidade . ", <b>Estado: </b>" . $cli->estado . "<b> - CEP: </b>" . $cli->cep .
            "<b>Telefone: </b>" . $cli->telefone . ", <b>Celular: </b>" . $cli->celular;
        }	
        ?>
        <?php
            echo heading("Ítens do pedido",4);
            $this->table->set_heading("Foto","Item","Título","Quantidade","Valor Unitário","Subtotal");
            foreach($itens as $item){						
                $foto = "&nbsp;";
                if(is_file("assets/img/produtos/".md5($item->id).".jpg")){
                    $propriedades_foto = array("src"=>"assets/img/produtos/".md5($item->id).".jpg","width"=>"100");
                    $foto = img($propriedades_foto);
                }						
                $this->table->add_row($foto,$item->item,$item->titulo,$item->quantidade,reais($item->preco),reais($item->preco * $item->quantidade));
            }
            echo $this->table->generate()
        ?>
        <p>Obrigado por comprar conosco. Este e-mail foi
        encaminhado automaticamente pelo nosso sistema em <?php echo date("d/m/Y H:i:s") ?></p>
	</body>
</html>