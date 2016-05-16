<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Administrar Usuários</h1>                		
            </div>
            <div class="col-lg-12">
				<?php
					echo validation_errors();
					echo form_open("administracao/usuarios/salvar_alteracao") .
						form_hidden("id",$usuario[0]->id) .
						form_label("Login","login") .
						form_input(array("id"=>"login","name"=>"login","class"=>"form-control","value"=>$usuario[0]->login)) .
						form_label("Senha","senha") .
						form_input(array("id"=>"senha","name"=>"senha","class"=>"form-control","value"=>$usuario[0]->senha)) . br() .
						form_submit(array("type"=>"submit","value"=>"Alterar cadastro","class"=>"btn")) .
					form_close()
                ?>
            </div>
        </div>
    </div>
</div>