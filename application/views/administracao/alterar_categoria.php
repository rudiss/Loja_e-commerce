<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12"><h1 class="page-header">Administrar Categorias</h1></div>
            <div class="col-lg-7">
            	<h3>Alerar categoria: <?php echo $categoria[0]->titulo ?></h3>
                <?php				
					echo validation_errors();
					$titulo = array('name'=>'txt_titulo','id'=>'txt_titulo','value'=>$categoria[0]->titulo);
					$descricao = array('name'=>'txt_descricao','id'=>'txt_descricao','value'=>$categoria[0]->descricao);
					echo form_open('administracao/categorias/salvar_alteracoes') . br() .
					form_hidden('id', md5($categoria[0]->id)) .
					form_label('Nome da categoria','txt_titulo') . br() .
					form_input($titulo) . br() .
					form_label('Descricao','txt_descricao') . br() .
					form_textarea($descricao) . br() .
					form_submit("btn_adicionar","Alterar cateogira") .
					form_close();
				?>
            </div>
            <div class="col-lg-5 imagem">
	            <h3>Imagem</h3>
				<?php
					if(is_file("assets/img/categorias/".md5($categoria[0]->id).".jpg")){
						echo img("assets/img/categorias/".md5($categoria[0]->id).".jpg?i=".date('dmYhis'));
					}
					echo form_open_multipart(base_url("administracao/categorias/nova_foto")) .
					form_hidden('id', md5($categoria[0]->id)) .
					form_upload("userfile") .
					form_submit("btn_adicionar","Adicionar nova imagem") .
					form_close();
				?>
            </div>
        </div>
    </div>
</div>