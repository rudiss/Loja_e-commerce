<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*******************************************************************************
* Controller da área de administração, transportadoras.
*******************************************************************************/
class Transportadoras extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->model('transportadoras_model', 'modeltransportadoras');
		$this->load->library('table');
		$this->load->model('usuarios_model', 'modelusuarios');		
		$this->modelusuarios->validar($this->router->class,$this->router->method);
    }    
    
	public function index(){
		$dados['faixas_fretes'] = $this->modeltransportadoras->tabela_fretes();
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/header');
		$this->load->view('administracao/transportadoras',$dados);
		$this->load->view('administracao/footer');
		$this->load->view('administracao/html_footer');
	}
	
	public function adicionar(){
		$peso_de = $this->input->post('peso_de');
		$peso_ate = $this->input->post('peso_ate');
		$preco = $this->input->post('preco');
		$adicional_kg = $this->input->post('adicional_kg');
		$uf = $this->input->post('uf');
		if($this->modeltransportadoras->adicionar($peso_de,$peso_ate,$preco,$adicional_kg,$uf)){
			redirect(base_url("administracao/transportadoras"));
		}
		else{
			echo "Houve um erro ao adicionar a faixa de preços";
		}
		
	}
	
	public function excluir($excluir){
		if($this->modeltransportadoras->excluir($excluir)){
			redirect(base_url("administracao/transportadoras"));
		}
		else{
			echo "Houve um erro ao adicionar a faixa de preços";
		}
	}
}