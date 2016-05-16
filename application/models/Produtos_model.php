<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*******************************************************************************
* Model dos produtos.
*******************************************************************************/
class Produtos_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    
    public function detalhes_produto($id){
        $this->db->where('id',$id);
		$this->db->or_where('md5(id)',$id);
        return $this->db->get('produtos')->result();
    }
    
    public function destaques_home($quantos = 3){
        $this->db->limit($quantos);
        $this->db->order_by('id','random');
        return $this->db->get('produtos')->result();
    }
    
    public function busca($buscar){
        $this->db->like('titulo',$buscar);
        $this->db->or_like('descricao',$buscar);        
        return $this->db->get('produtos')->result();
    }
	
	public function contar(){
		return $this->db->count_all('produtos');
	}
	
	public function listar($pular=null,$produtos_por_pagina=null){
		$this->db->select('categorias.titulo as categoria,produtos.id,produtos.codigo,produtos.titulo,produtos.preco,produtos.ativo');
		$this->db->from('produtos');
		$this->db->join('produtos_categorias', 'produtos_categorias.produto = produtos.id','left');
		$this->db->join('categorias', 'categorias.id = produtos_categorias.categoria','left');
		$this->db->group_by('produtos.id');
		$this->db->order_by('categorias.id','ASC');
		if($pular && $produtos_por_pagina){
			$this->db->limit($produtos_por_pagina,$pular);
		}
		else{
			$this->db->limit(5);
		}
		return $this->db->get()->result();
	}
	
	public function adicionar($codigo,$titulo,$preco,$largura,$altura,$comprimento,$peso,$descricao){
		$dados['codigo'] = $codigo;
		$dados['titulo'] = $titulo;
		$dados['preco'] = $preco;
		$dados['largura_caixa_mm'] = $largura;
		$dados['altura_caixa_mm'] = $altura;
		$dados['comprimento_caixa_mm'] = $comprimento;
		$dados['peso_gramas'] = $peso;
		$dados['descricao'] = $descricao;
		return $this->db->insert('produtos',$dados);
	}
	
	public function salvar_alteracoes($id,$codigo,$titulo,$preco,$largura,$altura,$comprimento,$peso,$descricao){
		$dados['codigo'] = $codigo;
		$dados['titulo'] = $titulo;
		$dados['preco'] = $preco;
		$dados['largura_caixa_mm'] = $largura;
		$dados['altura_caixa_mm'] = $altura;
		$dados['comprimento_caixa_mm'] = $comprimento;
		$dados['peso_gramas'] = $peso;
		$dados['descricao'] = $descricao;
		$this->db->where('md5(id)',$id);
		return $this->db->update('produtos',$dados);
	}
	
	public function excluir($id){
		$this->db->where('md5(id)',$id);
		return $this->db->delete('produtos');
	}
}