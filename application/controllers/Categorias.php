<?php
/*******************************************************************************
* Controller de cadastros de categorias.
*******************************************************************************/
defined('BASEPATH') OR exit('No direct script access allowed');
class Categorias extends CI_Controller {
    
	private $categorias;
    
	public function __construct(){
        parent::__construct();
        $this->load->model('categorias_model', 'modelcategorias');
        $this->categorias = $this->modelcategorias->listar_categorias();
    }
    
    public function index(){
        $this->load->helper('text');     
        $data_header['categorias'] = $this->categorias;
        $data_pagina['categorias'] = $this->categorias;       
    	$this->load->view('html-header');
        $this->load->view('header',$data_header);
    	$this->load->view('categorias',$data_pagina);
        $this->load->view('footer');
        $this->load->view('html-footer');
    }
    
    public function categoria($id,$slug = null){
        $this->load->helper('text');      
        $data_header['categorias'] = $this->categorias;
        $data_pagina['categoria'] = $this->modelcategorias->listar_produtos_categoria($id);        
        $this->load->view('html-header');
        $this->load->view('header',$data_header);
        $this->load->view('categoria',$data_pagina);
        $this->load->view('footer');
        $this->load->view('html-footer');
    }
    
}