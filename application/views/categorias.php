<div id="homebody">
    <div class="alinhado-centro borda-base espaco-vertical">
        <h2>Seja bem vindo a Fox Games.</h2>
        <h4><p>Os melhores games tudo em um lugar só!</p></h4>
        <a class="btn btn-medium btn-success" href="<?php echo base_url("cadastro") ?>">Cadastre-se</a>
    </div>
    <div class="row-fluid">  
      <?php
      $contador = 0;
      foreach($categorias as $categoria){
          $contador++;
          echo "<div class='span4 caixacategoria'>" .
          heading($categoria->titulo,3);		  
		  if(is_file("assets/img/categorias/".md5($categoria->id).".jpg")){
			echo img("assets/img/categorias/".md5($categoria->id).".jpg");
		  }
          echo "<p>". word_limiter($categoria->descricao,20) ."</p>" .
            anchor(base_url("categoria/".$categoria->id ."/". limpar($categoria->titulo)),"Ver produtos", array('class'=>'btn')) .
          "</div>";       
          if($contador%3 == 0){
              echo "</div><div class='row-fluid'>";
          }
      }
      ?>
    </div>
</div>