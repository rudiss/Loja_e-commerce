<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12"><h1 class="page-header">Administrar Clientes</h1></div>
            <div class="col-lg-12">
            	<h3>Alerar cliente: <?php echo $cliente[0]->nome ."&nbsp;". $cliente[0]->sobrenome ?></h3>
                <?php				
					echo validation_errors();
					foreach($cliente as $cli){
						echo form_open('administracao/clientes/salvar_alteracao',array('class'=>'cadastros')) . br() .
						form_hidden('id', md5($cli->id)) .						
						form_label('Nome','nome') . br() .
						form_input("nome",$cli->nome) . br() .
						form_label('Sobrenome','sobrenome') . br() .
						form_input("sobrenome",$cli->sobrenome) . br() .						
						form_label('RG','rg') . br() .
						form_input("rg",$cli->rg) . br() .						
						form_label('CPF','cpf') . br() .
						form_input("cpf",$cli->cpf) . br() .						
						form_label('Data de Nascimento','data_nascimento') . br() .
						form_input("data_nascimento",$cli->data_nascimento) . br() .						
						form_label('Sexo','sexo') . br() .
						form_dropdown('sexo',array("M"=>"Masculino","F"=>"Feminino"),$cli->sexo) . br() .
						form_label('Rua','rua') . br() .
						form_input("rua",$cli->rua) . br() .						
						form_label('Número','numero') . br() .
						form_input("numero",$cli->numero) . br() .						
						form_label('Bairro','bairro') . br() .
						form_input("bairro",$cli->bairro) . br() .						
						form_label('Cidade','cidade') . br() .
						form_input("cidade",$cli->cidade) . br() .						
						form_label('Estado','estado') . br() .
						form_input("estado",$cli->estado) . br() .						
						form_label('CEP','cep') . br() .
						form_input("cep",$cli->cep) . br() .						
						form_label('Telefone','telefone') . br() .
						form_input("telefone",$cli->telefone) . br() .
						form_label('Celular','celular') . br() .
						form_input("celular",$cli->celular) . br() .
						form_label('Email','email') . br() .
						form_input("email",$cli->email) . br() .
						form_label('Status','satus') . br() .						
						form_radio("status",1,set_radio("status",1, ($cli->status==1)?TRUE:FALSE )) . " Ativo " . 
						form_radio("status",0,set_radio("status",0, ($cli->status==0)?TRUE:FALSE )) . "Inativo" . br() .						
						form_submit("btn_alterar","Alterar cadastro") .
						form_close();
					}
				?>
            </div>
        </div>
    </div>
</div>