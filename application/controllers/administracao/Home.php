<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*******************************************************************************
* Classe que carrega a página inicial da área de administração e a tela de login
*******************************************************************************/
class Home extends CI_Controller {
    
	
    public function __construct(){
        parent::__construct();
        //$this->load->model('categorias_model', 'modelcategorias');
        //$this->categorias = $this->modelcategorias->listar_categorias();        
		$this->load->model('usuarios_model', 'modelusuarios');
		$this->modelusuarios->validar($this->router->class,$this->router->method);
    }    
    
	public function index(){
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/header');
		$this->load->view('administracao/home');
		$this->load->view('administracao/footer');
		$this->load->view('administracao/html_footer');
	}


	public function login(){
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/login');
		$this->load->view('administracao/html_footer');
	}
    
	/*
    function check_captcha($texto){
        if($texto === $this->session->userdata('palavra_captcha')){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
	function do_login(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('captcha_digitado_usuario', 'Captcha', 'required|callback_check_captcha');
		if(!$this->form_validation->run()){
			$this->index();
		}
		else{
			echo "Você inseriu a palavra " . $this->input->post('captcha_digitado_usuario') . " corretamente";
			//Restante das ações aqui...
		}
	}*/
    
}