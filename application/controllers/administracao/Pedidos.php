<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*******************************************************************************
* Controller da área de administração dos pedidos de clientes.
*******************************************************************************/
class Pedidos extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->model('pedidos_model', 'modelpedidos');
		$this->load->library('table');
		$this->load->model('usuarios_model', 'modelusuarios');		
		$this->modelusuarios->validar($this->router->class,$this->router->method);
    }    
    
	public function index(){
		$dados['total'] = $this->modelpedidos->contar();
		$dados['grafico'] = $this->modelpedidos->estatisticas();
		$dados['pedidos'] = $this->modelpedidos->listar($this->input->post('filtro'),$this->input->post('numero_nome'));
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/header');
		$this->load->view('administracao/pedidos',$dados);
		$this->load->view('administracao/footer');
		$this->load->view('administracao/html_footer');
	} 
	
	public function detalhes($pedido){
		$dados = $this->modelpedidos->detalhes($pedido);
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/header');
		$this->load->view('administracao/pedido',$dados);
		$this->load->view('administracao/footer');
		$this->load->view('administracao/html_footer');
	}
	
	public function alterar_status(){
		$id = $this->input->post('pedido_id');
		$status = $this->input->post('status');
		$comentarios = $this->input->post('comentarios');
		if($this->modelpedidos->alterar_status($id,$status,$comentarios)){
			$dados = $this->modelpedidos->detalhes(md5($id));
			$this->load->library('email');
			$this->email->from("loja@TheGroceryStoreBrazil","The Grocery Store Brazil");
			$this->email->to($dados['cliente'][0]->email);
			$this->email->subject('The Grocery Store Brazil - Pedido:'.$id);
			$this->email->message($this->load->view('emails/atualizacao_pedido',$dados,TRUE));            
			if($this->email->send()){
				redirect(base_url("administracao/pedidos/detalhes/".md5($id)));
			}
			else{
				return $this->email->print_debugger();
			}
		}
	}
	
	public function excluir($pedido){
		if($this->modelpedidos->excluir($pedido)){
			redirect(base_url("administracao/pedidos/"));
		}
		else{
			echo "Houve um erro ao excluir o pedido";
		}
	}
}