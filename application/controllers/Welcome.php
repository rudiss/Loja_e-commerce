<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*******************************************************************************
* Anatomia de um controller.
*******************************************************************************/
class Welcome extends CI_Controller{

	public function __construct(){
	    _parent::construct();
	}
    
	public function index(){
		$this->load->view('home');
	}
}