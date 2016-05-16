<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Administrar Usuários</h1>                		
            </div>
            <div class="col-lg-5">
            	<!--Inserir o formulário de cadastro aqui-->
				<?php
					echo validation_errors();
					echo form_open("administracao/usuarios/adicionar") .
						form_label("Login","login") .
						form_input(array("id"=>"login","name"=>"login","class"=>"form-control")) .
						form_label("Senha","senha") .
						form_password(array("id"=>"senha","name"=>"senha","class"=>"form-control")) . br() .
						form_submit(array("type"=>"submit","value"=>"Cadastrar","class"=>"btn")) .
					form_close()
                ?>
            </div>
            <div class="col-lg-1">&nbsp;</div>
            <div class="col-lg-6">
	            <h3>Listar usuarios</h3>
                <!--Inserir a tabela com a listagem aqui-->
				<?php          
                $this->table->set_heading("Excluir","Alterar","Permissões","Usuário");
                foreach($usuarios as $usuario){
                    $excluir = anchor(base_url("administracao/usuarios/excluir/".$usuario->id),"Excluir");
                    $alterar = anchor(base_url("administracao/usuarios/alterar/".$usuario->id),"Aleterar");
                    $permissoes = anchor(base_url("administracao/usuarios/permissoes/".$usuario->id),"Permissões");
                    $this->table->add_row($excluir,$alterar,$permissoes,$usuario->login);
                }
                $this->table->set_template(array('table_open' => '<table class="table table-striped miniaturas">'));
                echo $this->table->generate()
                ?>
            </div>
        </div>
    </div>
</div>