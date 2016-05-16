<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*******************************************************************************
* Controller do carrinho de compras.
*******************************************************************************/
class Carrinho extends CI_Controller{
    private $categorias;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('categorias_model', 'modelcategorias');
        $this->categorias = $this->modelcategorias->listar_categorias();
    }

    public function index() {        
        $data_header['categorias'] = $this->categorias;
        if(null != $this->session->userdata('logado') && count($this->cart->contents())>0){
            $sessao = $this->session->userdata();		
            $cep = str_replace("-", "",$sessao['cliente']->cep);
            $data['frete'] = $this->calcular_frete($cep);
            //$estado = $sessao['cliente']->estado; //Usar essa variável para o método de cálculo por transportadora.
            //$data['frete'] = $this->frete_transportadora($estado);
        }
        else{
            $data['frete'] = null;
        }
        $this->load->view('html-header');
        $this->load->view('header',$data_header);
        $this->load->view('carrinho',$data);
        $this->load->view('footer');
        $this->load->view('html-footer');        
    }
	
	public function form_pagamento() {        
		$data_header['categorias'] = $this->categorias;
		if(null != $this->session->userdata('logado')){
			$sessao = $this->session->userdata();		
			$cep = str_replace("-", "",$sessao['cliente']->cep);
			$data['frete'] = $this->calcular_frete($cep);
			//$estado = $sessao['cliente']->estado;
			//$data['frete'] = $this->frete_transportadora($estado);
		}
		else{
			$data['frete'] = null;
		}
		$this->load->view('html-header');
		$this->load->view('header',$data_header);
		$this->load->view('carrinho-formulario-pagamento',$data);
		$this->load->view('footer');
		$this->load->view('html-footer');        
	}

    public function adicionar() {
        $data = array('id' => $this->input->post('id'), 
            'qty' => $this->input->post('quantidade'), 
            'price' => $this->input->post('preco'), 
            'name' => $this->input->post('nome'),
            'altura' => $this->input->post('altura'), 
            'largura' => $this->input->post('largura'), 
            'comprimento' => $this->input->post('comprimento'), 
            'peso' => $this->input->post('peso'),
            'options' => null, 
            'url' => $this->input->post('url'), 
            'foto' => $this->input->post('foto'));
        $this->cart->insert($data);
        redirect(base_url("carrinho"));
    }
    
    function atualizar(){
        foreach($this->input->post() as $item){
            if(isset($item['rowid'])){                
                $data = array('rowid' => $item['rowid'],'qty' => $item['qty']);
                $this->cart->update($data);
            }
        }
        redirect(base_url('carrinho'));
    }
    
    function remover($rowid){
        $data = array('rowid' => $rowid,'qty' => 0);
        $this->cart->update($data);
        redirect(base_url('carrinho'));
    }
    
    function frete_transportadora($estado_destino){
        $peso = 0;
        foreach($this->cart->contents() as $item){
            $peso += ($item['peso'] * $item['qty']);
        }		
        $peso = ceil($peso/1000);
        $custo_frete = $this->db->query("SELECT * FROM tb_transporte_preco WHERE ucase(uf) = ucase('".$estado_destino."') AND peso_ate >= " . $peso ." ORDER BY preco LIMIT 1")->result();
        if(count($custo_frete) < 1){
            $custo_frete = $this->db->query("SELECT * FROM tb_transporte_preco WHERE uf = '".$estado_destino."' ORDER BY peso_ate DESC LIMIT 1")->result();
            print_r($custo_frete);
            if(count($custo_frete) < 1){
                $custo_frete = $this->db->query("SELECT * FROM tb_transporte_preco ORDER BY preco DESC LIMIT 1")->result();	
            }	
        }
        $adicional = 0;
        if($peso > $custo_frete[0]->peso_ate){
            $adicional = ($peso - $custo_frete[0]->peso_ate)* $custo_frete[0]->adicional_kg;
        }
        $preco_frete = ($custo_frete[0]->preco + $adicional);
        return $preco_frete;
    }
	
    function calcular_frete($cep_destino){
        /*           
        foreach($this->cart->contents() as $item){
            echo $item['qty'] . " X " .$item['name'] . "&nbsp;&nbsp;"; 
            echo $item['altura'] . " x " . $item['largura'] . " x " . $item['comprimento'] . "mm = ";
            echo (($item['altura']/10 * $item['largura']/10 * $item['comprimento']/10)/100). "cm<sup>3</sup>" . br(); 
        }        
        echo "<hr>";
        */        
        $maior_alt = $maior_lar = $maior_comp = $cm_cub = $peso = 0;        
        foreach($this->cart->contents() as $item){
            if($item['altura'] > $maior_alt){ $maior_alt = $item['altura'];}
            if($item['largura'] > $maior_lar){$maior_lar = $item['largura'];}
            if($item['comprimento'] > $maior_comp){ $maior_comp = $item['comprimento'];}
            $cm_cub += ((($item['altura']/10)*($item['largura']/10)*($item['comprimento']/10))/100) * $item['qty'];
            $peso += ($item['peso'] * $item['qty']);
        }        
        $maiores_dimensoes = array('alt'=>$maior_alt, 'lar'=> $maior_lar, 'comp'=>$maior_comp);
        arsort($maiores_dimensoes);
        foreach($maiores_dimensoes as $chave => $valor){$caixa[] = $valor;}        
        $dimensao1 = $caixa[0];
        $dimensao2 = $caixa[1];
        $dimensao3 = 1;
        $caixas = 1;
        while(((($dimensao1/10) * ($dimensao2/10) * ($dimensao3/10))/100) < $cm_cub){
            $dimensao3 ++;        
            if($dimensao3 %1000 == 0){
                $caixas++;
            }
        }
        if($caixas > 1){
            $dimensao3 = $dimensao3 - (($caixas -1)*1000);
        }
        /*    
        echo "Caixas: " . $caixas . br();
        echo "Cubagem total dos itens " . ceil($cm_cub) . " cm<sup>3</sup>".br();
        echo "Cubagem da caixa calculada:" . ceil(((($dimensao1/10) * ($dimensao2/10) * ($dimensao3/10))/100)) . " cm<sup>3</sup>".br();
        echo "Altura caixa: " . $dimensao1 . "mm".br();
        echo "Largura caixa: " . $dimensao2 . "mm".br();
        echo "Comprimento caixa: " . $dimensao3 . "mm". br();
        echo "Peso em Kg " . ($peso/1000) . br();
        */
        $cep_origem = 80060160;
        $preco_correio = 0;
        if($caixas==1){
            $preco_correio = $this->correio($cep_origem, $cep_destino, ($dimensao1/10), ($dimensao2/10), ($dimensao3/10), ($peso/1000));
        }
        else if($caixas > 1){
            $peso = ($peso / $caixas);
            for($i=$caixas;$i>0;$i--){
                if($i>1){
                    $preco_correio += $this->correio($cep_origem, $cep_destino, ($dimensao1/10), ($dimensao2/10), 100, ($peso/1000));
                }
                else{
                    $preco_correio += $this->correio($cep_origem, $cep_destino, ($dimensao1/10), ($dimensao2/10), ($dimensao3/10), ($peso/1000));
                }
            }
        }
        return $preco_correio;
    }

    function correio($cep_origem,$cep_destino,$comprimento,$altura,$largura,$peso){
		if($altura < 2){$altura = 2;} //-18 A altura não pode ser inferior a 2 cm.
		if($largura < 11){$largura = 11;} //-20 A largura não pode ser inferior a 11 cm.
		if($comprimento < 16){$comprimento = 16;} //-22 O comprimento não pode ser inferior a 16 cm.
		$data['nCdEmpresa'] = '';
        $data['sDsSenha'] = '';
        $data['sCepOrigem'] = $cep_origem;
        $data['sCepDestino'] = $cep_destino;
        $data['nVlPeso'] = $peso;
        $data['nCdFormato'] = '1';
        $data['nVlComprimento'] = $comprimento;
        $data['nVlAltura'] = $altura;
        $data['nVlLargura'] = $largura;
        $data['nVlDiametro'] = '0';
        $data['sCdMaoPropria'] = 's';
        $data['nVlValorDeclarado'] = '0';
        $data['sCdAvisoRecebimento'] = 'n';
        $data['StrRetorno'] = 'xml';
        $data['nCdServico'] = '40010'; //41106 PAC,40010 SEDEX,40045 SEDEX a Cobrar,40215 SEDEX 10.
        $data = http_build_query($data);        
        $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
        $curl = curl_init($url . '?' . $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        $result = simplexml_load_string($result);       
        foreach($result -> cServico as $row){
            if($row->Erro == 0) {
                return $row->Valor;
            }else{
                echo "<pre>";
                print_r($row);
            }
        }
    }
    
	/*
	* Método que faz o envio dos dados do cliente e pedido para o gateway de pagamentos,
	* grava as informações do pedido no banco de dados e dispara o método que envia o e-mail
	* com a confirmação de compra para o cliente.
	*/
	function finalizar_compra(){
		if(null != $this->session->userdata('logado')){
			$sessao = $this->session->userdata();
			$frete = $this->calcular_frete(str_replace("-", "",$sessao['cliente']->cep));
			if($this->input->post('tipo_pagamento')=='cartao'){
				//Lógica de pagamento por cartão de crédito.
				$this->db->trans_start();
				$dados['cliente'] = $sessao['cliente']->id;
				$dados['produtos'] = $this->cart->total();
				$dados['frete'] = (double)str_replace(",",".",$frete);
				$dados['status'] = 0;
				$dados['comentarios'] = "Novo pedido inserido no sistema.";
				$this->db->insert('pedidos',$dados);
				$pedido = $this->db->insert_id();			
				foreach($this->cart->contents() as $item){				
					$dados_item['pedido'] = $pedido;
					$dados_item['item'] = $item['id'];
					$dados_item['quantidade'] = $item['qty'];
					$dados_item['preco'] = $item['price'];
					$this->db->insert('itens_pedidos',$dados_item);
				}
				$total_a_cobrar = (double)($this->cart->total() + (double)str_replace(",",".",$frete));
				if($this->input->post('parcelamento')==1){$operacao = 'credito_a_vista';}else{$operacao = 'parcelado_loja';}
				require_once('./locaweb-gateway-php-master/LocawebGateway.php');		
				$array_pedido = array('numero'=>$pedido,'total'=>$total_a_cobrar,'moeda'=>'real','descricao'=>'Pedido: '.$pedido);	
				$array_pagamento = array('meio_pagamento'=>'cielo','parcelas'=>$this->input->post('parcelamento'),'tipo_operacao'=>$operacao,'bandeira'=>$this->input->post('bandeira'),'nome_titular_cartao'=>$this->input->post('cartao_nome'),'cartao_numero'=>$this->input->post('cartao_numero'),'cartao_cvv' => $this->input->post('cartao_cvv'),'cartao_validade'=>str_replace("/","",$this->input->post('cartao_validade')));							
				$array_comprador = array('nome'=>$sessao['cliente']->nome,'documento'=>$sessao['cliente']->cpf,'endereco' =>$sessao['cliente']->rua,'numero'=>$sessao['cliente']->numero,'cep'=>$sessao['cliente']->cep,'bairro'=>$sessao['cliente']->bairro,'cidade' => $sessao['cliente']->cidade,'estado' => $sessao['cliente']->estado);
				$array_transacao = array('url_retorno' => base_url('carrinho/finalizar_compra'),'capturar'=>'true','pedido'=>$array_pedido,'pagamento' => $array_pagamento,'comprador'=>$array_comprador);		
				$transacao = LocawebGateway::criar($array_transacao)->sendRequest();			
				if(!$transacao->transacao->erro){				
					$this->db->trans_commit();
					$this->cart->destroy();
					//ENVIO DO EMAIL DE CONFIRMAÇÃO AQUI.
					$dados_email['pedido'] = $array_pedido;
					$dados_email['comprador'] = $array_comprador;
					$dados_email['transacao'] = $transacao;
					$this->enviar_confirmacao($dados_email,$sessao['cliente']->email);
				}
				else{
					$this->db->trans_rollback();
				}
				$dados_retorno['transacao'] = $transacao;
				$dados_header['categorias'] = $this->categorias;	
				$this->load->view('html-header');
				$this->load->view('header',$dados_header);
				$this->load->view('retorno_cartao',$dados_retorno);			
				$this->load->view('footer');
				$this->load->view('html-footer');
				$this->db->trans_complete();
			}
			else if($this->input->post('tipo_pagamento')=='boleto'){
				//A LÓGICA DO PAGAMENTO COM BOLETO!
				$this->db->trans_start();
				$dados['cliente'] = $sessao['cliente']->id;
				$dados['produtos'] = $this->cart->total();
				$dados['frete'] = (double)str_replace(",",".",$frete);
				$dados['status'] = 0;
				$dados['comentarios'] = "Novo pedido inserido no sistema.";
				$this->db->insert('pedidos',$dados);
				$pedido = $this->db->insert_id();			
				foreach($this->cart->contents() as $item){				
					$dados_item['pedido'] = $pedido;
					$dados_item['item'] = $item['id'];
					$dados_item['quantidade'] = $item['qty'];
					$dados_item['preco'] = $item['price'];
					$this->db->insert('itens_pedidos',$dados_item);
				}
				$total_a_cobrar = (double)($this->cart->total() + (double)str_replace(",",".",$frete));
				require_once('./locaweb-gateway-php-master/LocawebGateway.php');		
				$array_pedido = array('numero'=>$pedido,'total'=>$total_a_cobrar,'moeda'=>'real','descricao'=>'Pedido: '.$pedido);	
				$vencimento_boleto = date('dmY', strtotime('+1 week')); //Dando uma semana de prazo para vencer o boleto.			
				$array_pagamento = array('meio_pagamento' => 'boleto_itau','data_vencimento' => $vencimento_boleto);							
				$array_comprador = array('nome'=>$sessao['cliente']->nome,'documento'=>$sessao['cliente']->cpf,'endereco' =>$sessao['cliente']->rua,'numero'=>$sessao['cliente']->numero,'cep'=>$sessao['cliente']->cep,'bairro'=>$sessao['cliente']->bairro,'cidade' => $sessao['cliente']->cidade,'estado' => $sessao['cliente']->estado);
				$array_transacao = array('url_retorno' => base_url('carrinho/finalizar_compra'),'capturar'=>'true','pedido'=>$array_pedido,'pagamento' => $array_pagamento,'comprador'=>$array_comprador);		
				$transacao = LocawebGateway::criar($array_transacao)->sendRequest();			
				if(!$transacao->transacao->erro){				
					$this->db->trans_commit();
					$this->cart->destroy();
					$dados_email['pedido'] = $array_pedido;
					$dados_email['comprador'] = $array_comprador;
					$dados_email['transacao'] = $transacao;
					$this->enviar_confirmacao($dados_email,$sessao['cliente']->email);
				}
				else{
					$this->db->trans_rollback();
				}
				$dados_retorno['transacao'] = $transacao;
				$dados_header['categorias'] = $this->categorias;	
				$this->load->view('html-header');
				$this->load->view('header',$dados_header);
				$this->load->view('retorno_boleto',$dados_retorno);			
				$this->load->view('footer');
				$this->load->view('html-footer');
				$this->db->trans_complete();
			}
			else{
				redirect(base_url('pagar-e-finalizar-compra'));
			}
		}
		else{
			redirect(base_url('login'));
		}
	}
	
	//Função que envia o e-mail de confirmação de um novo pedido para o cliente.
	function enviar_confirmacao($dados,$para){
		$this->load->library('email');
		$this->email->from("loja@TheGroceryStoreBrazil","The Grocery Store Brazil");
		$this->email->to($para);
		$this->email->subject('The Grocery Store Brazil - Pedido:'.$dados['pedido']['numero']);
		$this->email->message($this->load->view('emails/novo_pedido',$dados,TRUE));            
		if($this->email->send()){
			return "email enviado";
		}
		else{
			return $this->email->print_debugger();
		}
	}
	
	/*
	//Função utilizada para testar a configuação do gateway de pagamentos.
	function pagar(){
		require './locaweb-gateway-php-master/LocawebGateway.php';		
		$array_pedido = array('numero'=>10,
						'total' => 15,
						'moeda' => 'real',
						'descricao' => 'Pedido:10');
		$array_pagamento = array('meio_pagamento' => 'cielo',
						'parcelas' => 1, 
						'tipo_operacao' => 'credito_a_vista', 
						'bandeira' => 'visa',
						'nome_titular_cartao' => 'teste',
						'cartao_numero' => '4012001037141112',
						'cartao_cvv' => '973',
						'cartao_validade' => '082015');
		$array_comprador = array('nome' => 'John Doe',
						'documento' => '000.000.000-00',
						'endereco' => 'Rua X',
						'numero' => '98',
						'cep' => '1234-999',
						'bairro' => 'Centro',
						'cidade' => 'Curitiba',
						'estado' => 'PR');
		$array_transacao =array('url_retorno' => base_url('carrinho/retorno-pagamento'),
						'capturar' => 'true',
						'pedido' => $array_pedido,
						'pagamento' => $array_pagamento,
						'comprador' => $array_comprador);		
		$transacao = LocawebGateway::criar($array_transacao)->sendRequest();
		echo "<pre>";
		print_r($transacao);
	}*/

	/*
	function boleto(){
		require './locaweb-gateway-php-master/LocawebGateway.php';		
		$array_pedido = array('numero'=>13,
						'total' => 10,
						'moeda' => 'real',
						'descricao' => 'Pedido:13');
		$array_pagamento = array('meio_pagamento' => 'boleto_itau',
						'data_vencimento' => date("dmY"));
		$array_comprador = array('nome' => 'John Doe',
						'documento' => '96985674968',
						'endereco' => 'Rua X',
						'numero' => '98',
						'cep' => '1234-999',
						'bairro' => 'Centro',
						'cidade' => 'Curitiba',
						'estado' => 'PR');
		$array_transacao =array('url_retorno' => base_url('carrinho/retorno-pagamento'),
						'capturar' => 'true',
						'pedido' => $array_pedido,
						'pagamento' => $array_pagamento,
						'comprador' => $array_comprador);		
		$transacao = LocawebGateway::criar($array_transacao)->sendRequest();
		echo "<pre>";
		print_r($transacao);
	}
	*/
}