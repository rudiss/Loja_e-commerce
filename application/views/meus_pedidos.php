<?php
foreach($pedidos as $pedido){
	echo "<div class='row-fluid borda-base espaco-vertical'>
			<div class='span3 texto-direita'>"
			 . heading("Pedido: ".$pedido['pedido']->id,3) 
			 . date("d/m/Y - h:i",strtotime($pedido['pedido']->data)) . br()
			 . "Valor produtos: ". reais($pedido['pedido']->produtos) . br()
			 . "Frete: " . reais($pedido['pedido']->frete) . br()
			 . "Total: " . reais($pedido['pedido']->frete + $pedido['pedido']->produtos) . br()
			 . heading("Status:" . $pedido['pedido']->comentarios ,4)
		 . "</div>";
		 
	echo "<div class=span9>"
		. heading("Itens do pedido " . $pedido['pedido']->id,5);
		$this->table->set_heading("Código","Qtd","Preço","Subtotal","Item","Descrição");	
		foreach($pedido['itens'] as $item){
			$this->table->add_row($item->item,$item->quantidade,reais($item->preco),reais($item->quantidade * $item->preco),$item->titulo,word_limiter($item->descricao,10));
		}
		$this->table->set_template(array('table_open' => '<table class="table table-striped">'));
		echo $this->table->generate()
	 . "</div>
	</div>";
}