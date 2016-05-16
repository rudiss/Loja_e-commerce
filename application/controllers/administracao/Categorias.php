<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*******************************************************************************
* Controller da área de administração das categorias.
*******************************************************************************/
class Categorias extends CI_Controller {
    
	private $categorias;
	
    public function __construct(){
        parent::__construct();
        $this->load->model('categorias_model', 'modelcategorias');
        $this->categorias = $this->modelcategorias->listar_categorias();		
		$this->load->model('usuarios_model', 'modelusuarios');		
		$this->modelusuarios->validar($this->router->class,$this->router->method);
    }    
    
	public function index(){
		$this->load->library('table');
		$dados['categorias'] = $this->categorias;
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/header');
		$this->load->view('administracao/categorias',$dados);
		$this->load->view('administracao/footer');
		$this->load->view('administracao/html_footer');
	} 
	
	public function adicionar(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt_titulo', 'Nome da categoria','required|min_length[3]|is_unique[categorias.titulo]');
		$this->form_validation->set_rules('txt_descricao', 'Descricao', 'required|min_length[30]');
		if ($this->form_validation->run() == FALSE){
			$this->index();
		}
		else{
			$titulo = $this->input->post('txt_titulo');
			$descricao = $this->input->post('txt_descricao');
			if($this->modelcategorias->adicionar($titulo,$descricao)){
				redirect(base_url('administracao/categorias'));
			}
			else{
				echo "Houve um erro ao cadastrar a categoria.";
			}
		}
	}
	
	public function alterar($categoria){
		$dados['categoria'] = $this->modelcategorias->detalhes_categoria($categoria);
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/header');
		$this->load->view('administracao/alterar_categoria',$dados);
		$this->load->view('administracao/footer');
		$this->load->view('administracao/html_footer');
	}
	
	public function salvar_alteracoes(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt_titulo', 'Nome da categoria','required|min_length[3]');
		$this->form_validation->set_rules('txt_descricao', 'Descricao', 'required|min_length[30]');
		if ($this->form_validation->run() == FALSE){
			$this->index();
		}
		else{
			$id = $this->input->post('id');
			$titulo = $this->input->post('txt_titulo');
			$descricao = $this->input->post('txt_descricao');
			if($this->modelcategorias->salvar_alteracoes($id,$titulo,$descricao)){
				redirect(base_url('administracao/categorias/alterar/'.$id));
			}
			else{
				echo "Houve um erro ao cadastrar a categoria.";
			}
		}
	}
	
	public function nova_foto(){
		$id = $this->input->post('id');		
		$config['upload_path'] = './assets/img/categorias';
		$config['allowed_types'] = 'jpg';
		$config['file_name'] = $id.".jpg";
		$config['overwrite'] = TRUE;
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload()){
			echo $this->upload->display_errors();
		}
		else{
			$config2['source_image'] = './assets/img/categorias/'.$id.'.jpg';
			$config2['create_thumb'] = FALSE;
			$config2['width']         = 400;
			$config2['height']       = 400;
			$this->load->library('image_lib', $config2);			
			if($this->image_lib->resize()){			
				redirect(base_url('administracao/categorias/alterar/'.$id));
			}
			else{
				 echo $this->image_lib->display_errors();
			}
		}
	}
	
	public function excluir($categoria){
		if($this->modelcategorias->excluir($categoria)){
			redirect(base_url('administracao/categorias'));
		}
		else{
			echo "Houve um erro ao excluir a categoria.";
		}
	}
}