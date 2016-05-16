<div id="homebody">
    <div class="alinhado-centro borda-base espaco-vertical">
        <h3>Seja bem vindo a Fox Games.</h3>
        <p>Use o formulário abaixo para se cadastrar.</p>
    </div>
  <div class="row-fluid">
    <?php
    echo validation_errors();            
    echo form_open(base_url('cadastro/adicionar'),array('id'=>'form_cadastro')) .
    "<div class='span4'>" .
    	form_input(array('id'=>'nome','name'=>'nome','Placeholder'=>'Nome','value'=>set_value('nome'))) .
    	form_input(array('id'=>'sobrenome','name'=>'sobrenome','Placeholder'=>'Sobrenome','value'=>set_value('sobrenome'))) .
    	form_input(array('id'=>'rg','name'=>'rg','Placeholder'=>'Rg','value'=>set_value('rg'))) .
    	form_input(array('id'=>'cpf','name'=>'cpf','Placeholder'=>'Cpf','value'=>set_value('cpf'))) .
    	form_input(array('id'=>'data_nascimento','name'=>'data_nascimento','Placeholder'=>'Data de Nascimento','value'=>set_value('data_nascimento'))) .
    	form_input(array('id'=>'sexo','name'=>'sexo','Placeholder'=>'Sexo (M/F)','value'=>set_value('sexo'))) .
    "</div>
	<div class='span4'>" .
    	form_input(array('id'=>'cep','name'=>'cep','Placeholder'=>'CEP','value'=>set_value('cep'))) .
    	form_input(array('id'=>'rua','name'=>'rua','Placeholder'=>'Rua','value'=>set_value('rua'))) .
    	form_input(array('id'=>'bairro','name'=>'bairro','value'=>'','Placeholder'=>'Bairro','value'=>set_value('bairro'))) .
    	form_input(array('id'=>'cidade','name'=>'cidade','value'=>'','Placeholder'=>'Cidade','value'=>set_value('cidade'))) .
    	form_input(array('id'=>'estado','name'=>'estado','value'=>'','Placeholder'=>'Estado','value'=>set_value('estado'))) .
    	form_input(array('id'=>'numero','name'=>'numero','value'=>'','Placeholder'=>'Número','value'=>set_value('numero'))) .
    "</div>
	<div class='span4'>" .
    	form_input(array('id'=>'telefone','name'=>'telefone','value'=>'','Placeholder'=>'Telefone','value'=>set_value('telefone'))) .
    	form_input(array('id'=>'celular','name'=>'celular','value'=>'','Placeholder'=>'Celular','value'=>set_value('celular'))) .
    	form_input(array('id'=>'email','name'=>'email','value'=>'','Placeholder'=>'E-mail','value'=>set_value('email'))) .
    	form_input(array('id'=>'senha','name'=>'senha','value'=>'','Placeholder'=>'Senha','value'=>set_value('senha'))) .
    	form_submit('btn_cadastrar','Cadastrar') .
    "</div>" .
    form_close();
    ?>
  </div>  
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#cpf').mask('000.000.000-00', {reverse: true});
    $('#cep').mask('00000-000', {reverse: true});
    $('#telefone').mask('(00)0000.00000', {reverse: true});
    $('#celular').mask('(00)0000.00000', {reverse: true});
    $('#data_nascimento').mask('00/00/0000', {reverse: true});
    $('#sexo').mask('A', {reverse: true});
    $("#cep").blur(function(){
        $.getJSON("https://viacep.com.br/ws/"+ $("#cep").val() +"/json", function(dados) {
            if (!("erro" in dados)) {
                $("#rua").val(dados.logradouro);
                $("#bairro").val(dados.bairro);
                $("#cidade").val(dados.localidade);
                $("#estado").val(dados.uf);
                $("#numero").focus();
            }
            else {
                alert("CEP não encontrado.");
            }
        });
    }); 
});    
</script>