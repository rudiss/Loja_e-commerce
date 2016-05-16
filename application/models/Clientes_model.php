<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*******************************************************************************
* Model clientes.
*******************************************************************************/
class Clientes_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }    
    public function listar($filtro = null){
		$this->db->select("(SELECT count(*) FROM pedidos WHERE cliente = (clientes.id)) as numero_pedidos, clientes.*");
		$this->db->from('clientes');
		$this->db->join('pedidos', 'pedidos.cliente = clientes.id', 'left');
		if($filtro){
			if($filtro == 'novos'){
				$this->db->where('clientes.status',0);
			}
			else if($filtro == 'pedidos-abertos'){
				$this->db->where('pedidos.status',0);
			}
		}		
		$this->db->group_by('clientes.id');
        return $this->db->get()->result();
    }
	
	public function detalhes($cliente){
		$this->db->where('md5(id)',$cliente);
		return $this->db->get('clientes')->result();
	}
	
	public function salvar_alteracao($id,$nome,$sobrenome,$rg,$cpf,$data_nascimento,$sexo,$cep,$rua,$bairro,$cidade,$estado,$numero,$telefone,$celular,$email,$status){
		$dados['nome'] = $nome;
		$dados['sobrenome'] = $sobrenome;
		$dados['rg'] = $rg;
		$dados['cpf'] = $cpf;
		$dados['data_nascimento'] = $data_nascimento;
		$dados['sexo'] = $sexo;
		$dados['cep'] = $cep;
		$dados['rua'] = $rua;
		$dados['bairro'] = $bairro;
		$dados['cidade'] = $cidade;
		$dados['estado'] = $estado;
		$dados['numero'] = $numero;
		$dados['telefone'] = $telefone;
		$dados['celular'] = $celular;
		$dados['email'] = $email;
		$dados['status'] = $status;            
		$this->db->query("INSERT INTO clientes_log SELECT * FROM clientes WHERE md5(id) = '".$this->input->post('id')."'");
		$this->db->where('md5(id)',$this->input->post('id'));
		return $this->db->update('clientes',$dados);
	}
	
	public function excluir_cliente($cliente){
		$this->db->where('md5(id)',$cliente);
		return $this->db->delete('clientes');
	}
	
}