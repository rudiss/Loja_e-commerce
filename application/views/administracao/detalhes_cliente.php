<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12"><h1 class="page-header">Administrar Clientes</h1></div>
            <div class="col-lg-12">
            	<h3>Detalhes cliente: <?php echo $cliente[0]->nome ."&nbsp;". $cliente[0]->sobrenome ?></h3>
                <?php				
					foreach($cliente[0] as $chave => $valor){
						echo "<strong>" . ucfirst(strtolower(str_replace("_","&nbsp;",$chave))) .": </strong>". ucfirst($valor) . br();
					}
					
					echo anchor("#imprimir","Imprimir","onclick='self.print()'") . " | " . anchor("#voltar","Voltar","onclick='javascript:history.go(-1)'");
				?>
            </div>
        </div>
    </div>
</div>