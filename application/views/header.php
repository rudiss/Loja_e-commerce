<div class="container">
  <div class="masthead">
    <div id="cadastro-e-login">
        <?php 
        if(null != $this->session->userdata('logado')){
            echo "Seja bem vindo: " . $this->session->userdata('cliente')->nome . " " . $this->session->userdata('cliente')->sobrenome .
            anchor(base_url("alterar-cadastro/". md5($this->session->userdata('cliente')->id))," Alterar cadastro ") .
			anchor(base_url("meus-pedidos")," Meus Pedidos ") .
            anchor(base_url("logout")," Logout");
        }
        else{
            echo anchor(base_url("cadastro"),"Cadastro ") .
            anchor(base_url("login")," Login");
        }
        echo anchor(base_url("carrinho")," Carrinho [".$this->cart->total_items()."] ");
        ?>
    </div>
    <?php echo heading('FOX GAMES', 3, 'class="muted"') ?>
    <!-- Restante da view -->
    <ul class="nav nav-tabs">
        <li class="active"><?php echo anchor(base_url(),"Home") ?></li> 
        
        
        <li class="dropdown">
        <?php echo anchor(base_url("produtos"),"Jogos por Gênero<b class='caret'></b>",array("class"=>"dropdown-toggle","data-toggle"=>"dropdown")) ?>
            <ul class="dropdown-menu">
                <?php
                foreach($categorias as $categoria){ 
                    echo "<li>".anchor(base_url("categoria/".$categoria->id ."/". limpar($categoria->titulo)),$categoria->titulo)."</li>"; 
                }?>
            </ul>
        </li>
        <li><?php echo anchor(base_url('fale-conosco'),"Mapa do site") ?></li>
        <li><a href="contato.php
               ">contato</a></li>
        <li><?php echo anchor(base_url('fale-conosco'),"Fale conosco") ?></li>
        <li style="float: right">
        <?php
            $atributos = array("name"=>"form_busca","id"=>"form_busca","class"=>"navbar-search pull-right");
            echo form_open(base_url("home/buscar"),$atributos) .
                form_input(array('type'=>'text','name'=>'txt_busca','id'=>'txt_busca','placeholder'=>'Buscar','class'=>'search-query')) .
                form_input(array('type'=>'submit','name'=>'btn_busca','id'=>'btn_busca','value'=>'Buscar')) .
            form_close();
        ?>
        </li>
  </ul>
  </div>