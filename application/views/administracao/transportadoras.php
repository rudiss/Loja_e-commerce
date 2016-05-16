<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tabela de frete</h1>                		
            </div>
            <div class="col-lg-3">
            	<div class="panel panel-default">
                	<div class='panel-heading'>
                    	Cadastrar faixa de preço.
                    </div>
                    <div class='panel-body'>
					<?php
                        echo form_open('administracao/transportadoras/adicionar');
                        $campos = $this->db->list_fields('tb_transporte_preco');
                        foreach($campos as $campo){
                            if($campo != 'id'){
                                echo form_label(ucfirst(str_replace("_"," ",($campo))) , $campo);				
                                echo form_input(array("name"=>$campo,"id"=>$campo,"class"=>"form-control"));
                            }
                        }
                        echo br() . form_submit(array("name"=>"adicionar","value"=>"Adicionar","class"=>"btn btn-default"));
                        echo form_close();
                    ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="panel panel-default">
                    <div class='panel-heading'>
                    	Faixas de preço por Kg cadastradas.
                    </div>
                    <div class='panel-body'>
<?php
	$this->table->set_template(array('table_open' => '<table class="table table-striped">'));
	echo $this->table->generate($faixas_fretes);
?>
                    </div>
                </div>
            </div>
    	</div>
    </div>
</div>