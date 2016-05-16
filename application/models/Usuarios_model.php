<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*******************************************************************************
* Model dos usuários.
*******************************************************************************/
class Usuarios_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}
		
	public function efetuar_login($login,$senha){
		$this->db->where('login',$login);
		$this->db->where('senha',$senha);
		return $this->db->get('usuarios')->result();
	}
	
	public function adicionar($login,$senha){
		$dados['login'] = $login;
		$dados['senha'] = $senha;
		return $this->db->insert('usuarios',$dados);
	}
	
	public function detalhes($login){
		$this->db->where('id',$login);
		return $this->db->get('usuarios')->result();
	}
	
	public function salvar_alteracao($id,$login,$senha){
		$dados['login'] = $login;
		$dados['senha'] = $senha;
		$this->db->where('id',$id);
		return $this->db->update('usuarios',$dados);
	}
	
	public function excluir($login){
		$this->db->where('id',$login);
		return $this->db->delete('usuarios');
	}
	
	public function validar($classe,$metodo){	
		@$this->verifica_metodo_existe($classe,$metodo);
		$ignorar = array('efetuar_login','login','sem_permissao','logout');		
		if(!$this->session->userdata('login') && !in_array($metodo,$ignorar)){
			redirect(base_url("administracao/login"));
		}		
		else if($this->session->userdata('login') && !in_array($metodo,$ignorar)){
			$this->db->select('classes_metodos.id as id_metodo,');
			$this->db->from('classes_metodos');
			$this->db->join('permissoes', 'permissoes.metodo = classes_metodos.id');
			$this->db->where('classes_metodos.classe',$classe);
			$this->db->where('classes_metodos.metodo',$metodo);
			$this->db->where('permissoes.usuario',$this->session->userdata('id_usuario'));
			$permissao = $this->db->get()->result();
			if(count($permissao)!=1){
				redirect(base_url("administracao/sem-permissao"));
			}
		}
	}	
	
	private function verifica_metodo_existe($classe,$metodo){
		$this->db->where('classe',$classe);
		$this->db->where('metodo',$metodo);
		if($this->db->count_all_results('classes_metodos') < 1){
			$dados['classe'] = $classe;
			$dados['metodo'] = $metodo;
			$dados['nome_amigavel'] = $metodo . " - " . $classe;
			$this->db->insert('classes_metodos',$dados);
		}		
	}
	
	public function listar(){
		$this->db->order_by('id','DESC');
		return $this->db->get('usuarios')->result();
	}
	
	public function listar_permissoes_usuario($usuario){
		$this->db->select('permissoes.usuario,classes_metodos.*');
		$this->db->from('classes_metodos');
		$this->db->join('permissoes', 'permissoes.metodo = classes_metodos.id AND permissoes.usuario = '.$usuario,'LEFT');
		$this->db->order_by('classes_metodos.classe,classes_metodos.metodo');
		return $this->db->get()->result();
	}
	
	public function alterar_permissoes_usuario($usuario,$metodo){
		$this->db->trans_start();
		$this->db->where('usuario',$usuario);
		$this->db->delete('permissoes');
		foreach($metodo as $permitir){
			$dados['usuario'] = $usuario;
			$dados['metodo'] = $permitir;
			$this->db->insert('permissoes',$dados);
		}
		$this->db->trans_complete();
		if($this->db->trans_status()===FALSE){
			return FALSE;
		}
		else{
			return TRUE;
		}
	}
}