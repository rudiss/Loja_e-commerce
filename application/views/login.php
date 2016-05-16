<div id="homebody">
    <div class="alinhado-centro borda-base espaco-vertical">
        <h3>Efetuar Login</h3>
        <p>Informe os dados de usuário e senha para fazer login no website.</p>
    </div>
  <div class="row-fluid">
   <?php
    echo validation_errors();            
    echo form_open(base_url('cadastro/login'),array('id'=>'form_login')) .
    form_input(array('id'=>'email','name'=>'email','Placeholder'=>'E-mail','value'=>set_value('email'))) .
    form_password(array('id'=>'senha','name'=>'senha','Placeholder'=>'Senha')) .
    form_submit("btnLogin","Efetuar Login") .
    form_close() .
    anchor(base_url('esqueci-minha-senha'),"Esqueci minha senha");
   ?>
  </div>  
</div>