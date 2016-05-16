<?php
echo form_open(base_url("carrinho/finalizar_compra")) .
"<div class='row-fluid'>
	<div class='span3 texto-direita'>" .
		heading("Valores",3) .
		"Produtos: " . reais($this->cart->total()) . br() .
		"Frete: " . reais($frete) . br() .
		"Total: " . reais($this->cart->total() + $frete) . br() .
		"Pagar com cartão " . form_radio(array('name'=>'tipo_pagamento','value'=>'cartao','selected'=>'selected')) . br() .
		"Pagar com boleto " . form_radio(array('name'=>'tipo_pagamento','value'=>'boleto')) . br() . 
	"</div>" .	
	"<div class=span1></div>" .
	"<div id='dados_cartao'>" .
		'<div class=span4>';
		$bandeiras = array('mastercard'=>'Mastercard','visa'=>'Visa');
		echo form_label('Bandeira do cartão de crédito') .
			form_dropdown('bandeira',$bandeiras) .
			form_label('Nome no cartão de crédito','cartao_nome') . 
			form_input('cartao_nome') . 
			form_label('Número do cartão de crédito','cartao_numero') .
			form_input('cartao_numero') .
		'</div><div class=span4>' .
			form_label('Validade do cartão','cartao_validade') .
			form_input('cartao_validade') .
			form_label('Código verificador','cartao_cvv') .
			form_input('cartao_cvv');
		$parcelas = array(
			1=>'1 parcela de ' .reais($this->cart->total() + $frete),
			2=>'2 parcelas de ' .reais(($this->cart->total()+$frete)/2),
			3=>'3 parcelas de ' .reais(($this->cart->total()+$frete)/3));
		echo form_label('Parcelamento','parcelamento') .
			form_dropdown('parcelamento',$parcelas) .
		'</div>
	</div>' .
	form_submit(array('id'=>'pagar','value'=>'Pagar e finalizar compra','class'=>'a-direita')) .
form_close() .
"</div>";
?>
<script type="text/javascript">
$(document).ready(function(){
	$("input[name='tipo_pagamento']").click(function(){
		if($("input[name='tipo_pagamento']:checked").val() == 'boleto'){
			$('#dados_cartao').hide();
		}else{
			$('#dados_cartao').show();
		}
	});
});
</script>