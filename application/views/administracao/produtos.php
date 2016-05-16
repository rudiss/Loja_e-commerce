<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Administrar Produtos</h1>                		
            </div>
            <div class="col-lg-4">
            	<h3>Adicionar novo produto</h3>
				<?php
                    echo validation_errors();					
                    echo form_open('administracao/produtos/adicionar',array('class'=>'cadastros')) .
                    form_label("Código","txt_codigo") .
                    form_input(array('name'=>'txt_codigo','id'=>'txt_codigo','value'=>set_value('txt_codigo'))) . 
                    form_label("Título","txt_titulo") .
                    form_input(array('name'=>'txt_titulo','id'=>'txt_titulo','value'=>set_value('txt_titulo'))) . 
                    form_label("Preço","txt_preco") .
                    form_input(array('name'=>'txt_preco','id'=>'txt_preco','value'=>set_value('txt_preco'))) . 
                    form_label("Largura da caixa (mm)","txt_largura_caixa_mm") .
                    form_input(array('name'=>'txt_largura_caixa_mm','id'=>'txt_largura_caixa_mm','value'=>set_value('txt_largura_caixa_mm'))) . 
                    form_label("Altura da caixa (mm)","txt_altura_caixa_mm") . 
                    form_input(array('name'=>'txt_altura_caixa_mm','id'=>'txt_altura_caixa_mm','value'=>set_value('txt_altura_caixa_mm'))) . 
                    form_label("Comprimento da caixa (mm)","txt_comprimento_caixa_mm") .
                    form_input(array('name'=>'txt_comprimento_caixa_mm','id'=>'txt_comprimento_caixa_mm','value'=>set_value('txt_comprimento_caixa_mm'))) . 
                    form_label("Peso da caixa (gramas)","txt_peso_gramas") . 
                    form_input(array('name'=>'txt_peso_gramas','id'=>'txt_peso_gramas','value'=>set_value('txt_peso_gramas'))) . 
                    form_label("Descrição","txt_descricao") . 
                    form_textarea(array('name'=>'txt_descricao','id'=>'txt_descricao','value'=>set_value('txt_descricao'))) . 
                    form_submit("btn_adicionar","Adicionar novo produto") .
                    form_close();
                ?>
            </div>
            <div class="col-lg-8">
	            <h3>Alterar produtos existentes</h3>
				<?php
                    $this->table->set_heading("Imagem","Excluir","Alterar","Categoria","Código","Titulo","Preço","Status");
                    foreach($produtos as $produto){
                        $imagem = img("assets/img/categorias/categoria-sem-foto.png");
                        if(is_file("assets/img/produtos/".md5($produto->id).".jpg")){
                            $imagem = img("assets/img/produtos/".md5($produto->id).".jpg");
                        }
                        $excluir = anchor(base_url("administracao/produtos/excluir/".md5($produto->id)),"Excluir",array('onclick'=>"return confirm('Confirma exclusão?')"));
                        $alterar = anchor(base_url("administracao/produtos/alterar/".md5($produto->id)),"Aleterar");
                        $codigo = $produto->codigo;
                        $categoria = $produto->categoria;
                        $titulo = $produto->titulo;
                        $preco = reais($produto->preco);
                        $status = ($produto->ativo == 1)?"Ativo":"Inativo";
                        $this->table->add_row($imagem,$excluir,$alterar,$categoria,$codigo,$titulo,$preco,$status);
                    }
                    $this->table->set_template(array('table_open' => '<table class="table table-striped miniaturas">'));
                    echo $this->table->generate();
                    echo "<div class='paginate_button'>"  . $links_paginacao . "</div>";
                ?>
            </div>
        </div>
    </div>
</div>