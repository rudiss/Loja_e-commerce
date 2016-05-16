<?php
echo form_open(base_url("carrinho/atualizar"));
$contador = 1;
foreach($this->cart->contents() as $item){
  echo form_hidden($contador.'[rowid]', $item['rowid']) .
  "<div class='row-fluid linha-carrinho'>" .
  	"<div class='span1 texto-direita'>" . anchor(base_url('carrinho/remover/'.$item['rowid']) ,"Remover") . "</div>" .
    "<div class='span2'>" . img(array("src"=>$item['foto'], "class"=>"miniatura")) . "</div>" .
    "<div class='span3'>" . anchor($item['url'], $item['name']) . "</div></a>" .
    "<div class='span2'>" . form_input(array("name"=> $contador."[qty]" ,"value"=> $item['qty'])) . "</div>" .
    "<div class='span2 texto-direita'>" . reais($item['price']) . "</div>" .
    "<div class='span2 texto-direita'>" . reais($item['subtotal']) . "</div>" .
  "</div>";
  $contador++;
}

echo "<div class='row-fluid'>" .
    "<div class='span9'>" . form_submit("btnAtualizar","Atualizar quantidades") . "</div>" .
    "<div class='span1 texto-direita'>Total itens:</div>" .
    "<div class='span2 texto-direita'>" . reais($this->cart->total()) . "</div>" .
"</div>" .
form_close();

if($frete){
	echo "<div class='row-fluid'>" .
		"<div class='span9'></div>" .
		"<div class='span1 texto-direita'>Frete:</div>" .
		"<div class='span2 texto-direita'>" . reais($frete) . "</div>" .
		"</div><div class='row-fluid'>" .
		"<div class='span8'>". anchor(base_url("pagar-e-finalizar-compra"),"Pagar e finalizar compra") ."</div>" .
		"<div class='span2 texto-direita'>Total da compra:</div>" .
		"<div class='span2 texto-direita'>" . reais($this->cart->total() + $frete) . "</div>" .
	"</div>";
}
else{
	echo "<div class='row-fluid'>" .
		"<div class='span12 texto-direita'>" .
		"Efetue ". anchor(base_url('login'),'login') ." para calcular o frete e finalizar a compra" .
		"</div>" .
	"</div>";
}
?>