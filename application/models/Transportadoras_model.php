<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*******************************************************************************
* Model das transportadoras.
*******************************************************************************/
class Transportadoras_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function tabela_fretes(){
        $this->db->select("concat('<a href=./transportadoras/excluir/',id,'>',id,'</a>') as Excluir");
		$this->db->select("peso_de as 'De Kg',peso_ate as 'Ate Kg',preco as R$,adicional_kg as 'R$ por Kg Adicional',uf as Estado");
        return $this->db->get('tb_transporte_preco');
    }
	public function adicionar($peso_de,$peso_ate,$preco,$adicional_kg,$uf){
		$dados['peso_de'] = $peso_de;
		$dados['peso_ate'] = $peso_ate;
		$dados['preco'] = $preco;
		$dados['adicional_kg'] = $adicional_kg;
		$dados['uf'] = $uf;
		return $this->db->insert('tb_transporte_preco',$dados);
	}
	public function excluir($excluir){
		$this->db->where('id',$excluir);
		return $this->db->delete('tb_transporte_preco');
	}
	
}