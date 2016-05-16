<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*******************************************************************************
* Controller da área de administração, usuários.
*******************************************************************************/
class Usuarios extends CI_Controller {
    private $categorias;
    public function __construct(){
        parent::__construct();
        $this->load->model('usuarios_model', 'modelusuarios');
		$this->modelusuarios->validar($this->router->class,$this->router->method);
    }    
	
	public function efetuar_login(){
		$usuario = $this->input->post('usuario');
		$senha = $this->input->post('senha');
		$login = $this->modelusuarios->efetuar_login($usuario,$senha);
		if(count($login)===1){
			$sessao = array("login"=>TRUE,"id_usuario"=>$login[0]->id,"usuario"=>$login[0]->login);
			$this->session->set_userdata($sessao);
			redirect(base_url("administracao"));
		}
		else{
			redirect(base_url("administracao/login"));
		}
	}
	
	public function sem_permissao(){
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/sem_permissao');
		$this->load->view('administracao/html_footer');
	}
	
	public function logout(){
		if($this->session->unset_userdata('login') &&
		$this->session->unset_userdata('id_usuario') &&
		$this->session->unset_userdata('usuario')){
			redirect(base_url("administracao/login"));
		}
		else{
			$this->session->sess_destroy();
			redirect(base_url("administracao/login"));
		}
	}
	
	public function index(){
		$this->load->library('table');
		$dados['usuarios'] = $this->modelusuarios->listar();
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/header');
		$this->load->view('administracao/usuarios',$dados);
		$this->load->view('administracao/footer');
		$this->load->view('administracao/html_footer');
	}
	
	public function permissoes($usuario){
		$this->load->library('table');
		$dados['usuario'] = $usuario;
		$dados['permissoes'] = $this->modelusuarios->listar_permissoes_usuario($usuario);
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/header');
		$this->load->view('administracao/permissoes',$dados);
		$this->load->view('administracao/footer');
		$this->load->view('administracao/html_footer');
	}
	
	public function alterar_permissoes(){
		$usuario = $this->input->post("usuario");
		$metodo = $this->input->post("metodo");
		if($this->modelusuarios->alterar_permissoes_usuario($usuario,$metodo)){
			redirect(base_url("administracao/usuarios/permissoes/".$usuario));
		}
		else{
			echo "Não foi possível alterar as permissões do usuário";
		}
	}
	
	public function adicionar(){
		$login = $this->input->post('login');
		$senha = $this->input->post('senha');		
		if($this->modelusuarios->adicionar($login,$senha)){
			redirect(base_url("administracao/usuarios"));
		}
		else{
			echo "Não foi possível adicionar o usuário";
		}
	}
	
	public function alterar($usuario){
		$dados['usuario'] = $this->modelusuarios->detalhes($usuario);
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/header');
		$this->load->view('administracao/alterar_usuario',$dados);
		$this->load->view('administracao/footer');
		$this->load->view('administracao/html_footer');
	}
	
	public function salvar_alteracao(){
		$id = $this->input->post('id');
		$login = $this->input->post('login');
		$senha = $this->input->post('senha');
		if($this->modelusuarios->salvar_alteracao($id,$login,$senha)){
			redirect(base_url("administracao/usuarios"));
		}
		else{
			echo "Não foi possível alterar o usuário";
		}
	}
	
	public function excluir($usuario){
		if($this->modelusuarios->excluir($usuario)){
			redirect(base_url("administracao/usuarios"));
		}
		else{
			echo "Não foi possível excluir o usuário";
		}
	}
}