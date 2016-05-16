<div id="homebody">
    <div class="alinhado-centro borda-base espaco-vertical">
        <?php echo heading($produtos[0]->titulo,3) ?>
    </div>
    <div class="row-fluid">  
        <div class='span4'>
		<?php 
			if(is_file("assets/img/produtos/".md5($produtos[0]->id).".jpg")){
				$foto = base_url("assets/img/produtos/".md5($produtos[0]->id).".jpg");
			}
			else{			
				$foto = base_url("assets/img/produto-sem-foto.png");
			}
			echo img($foto);
        ?>
        </div>
        <div class='span5'>
        <?php 
		  foreach($produtos as $produto){          
            echo "<p>".$produto->descricao."</p>" .
            heading($produto->codigo,6) .
            heading( reais($produto->preco),5);
          }
		?>
        </div>
        <div class="span3">
        <?php
			$campos_hidden = array('id' => $produtos[0]->codigo,
                'url' => base_url(uri_string()),
                'foto'=> $foto,
                'nome'=> $produtos[0]->titulo,                
                'altura'=> $produtos[0]->altura_caixa_mm,
                'largura'=> $produtos[0]->largura_caixa_mm,
                'comprimento'=> $produtos[0]->comprimento_caixa_mm,
                'peso'=> $produtos[0]->peso_gramas,                
                'preco'=> $produtos[0]->preco);
            echo heading("Comprar " . $produtos[0]->titulo,5) .
            "Preço unitário: " . reais($produto->preco) . br() .
            form_open(base_url("carrinho/adicionar")) .            
            form_hidden($campos_hidden) .
            form_input("quantidade",1) .
            form_submit("adicionar","Adicionar ao carrinho") .
            form_close();
        ?>
        </div>
    </div>
</div>