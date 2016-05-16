<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12"><h1 class="page-header">Administrar produtos</h1></div>
            <div class="col-lg-7">
            	<h3>Alerar produto: <?php echo $produto[0]->titulo ?></h3>
                <?php				
					echo validation_errors();					
					echo form_open('administracao/produtos/salvar_alteracoes',array('class'=>'cadastros')) .
                    form_hidden('id', md5($produto[0]->id)) .
					form_label("Código","txt_codigo") .
                    form_input(array('name'=>'txt_codigo','id'=>'txt_codigo','value' => $produto[0]->codigo)) . 
                    form_label("Título","txt_titulo") .
                    form_input(array('name'=>'txt_titulo','id'=>'txt_titulo','value' => $produto[0]->titulo)) . 
                    form_label("Preço","txt_preco") .
                    form_input(array('name'=>'txt_preco','id'=>'txt_preco','value' => $produto[0]->preco)) . 
                    form_label("Largura da caixa (mm)","txt_largura_caixa_mm") .
                    form_input(array('name'=>'txt_largura_caixa_mm','id'=>'txt_largura_caixa_mm','value' => $produto[0]->largura_caixa_mm)) . 
                    form_label("Altura da caixa (mm)","txt_altura_caixa_mm") . 
                    form_input(array('name'=>'txt_altura_caixa_mm','id'=>'txt_altura_caixa_mm','value' => $produto[0]->altura_caixa_mm)) . 
                    form_label("Comprimento da caixa (mm)","txt_comprimento_caixa_mm") .
                    form_input(array('name'=>'txt_comprimento_caixa_mm','id'=>'txt_comprimento_caixa_mm','value' => $produto[0]->comprimento_caixa_mm)) . 
                    form_label("Peso da caixa (gramas)","txt_peso_gramas") . 
                    form_input(array('name'=>'txt_peso_gramas','id'=>'txt_peso_gramas','value' => $produto[0]->peso_gramas)) . 
                    form_label("Descrição","txt_descricao") . 
                    form_textarea(array('name'=>'txt_descricao','id'=>'txt_descricao','value' => $produto[0]->descricao)) . 

					form_submit("btn_adicionar","Alterar produto") . br() . br() .
					form_close();
				?>
            </div>
            <div class="col-lg-5 imagem">
	            <h3>Imagem</h3>
				<?php
				if(is_file("assets/img/produtos/".md5($produto[0]->id).".jpg")){
					echo img("assets/img/produtos/".md5($produto[0]->id).".jpg?i=".date('dmYhis'));
				}
				echo form_open_multipart(base_url("administracao/produtos/nova_foto")) .
				form_hidden('id', md5($produto[0]->id)) .
				form_upload("userfile") .
				form_submit("btn_adicionar","Adicionar nova imagem") .
				form_close();
				?>
            </div>
        </div>
    </div>
</div>