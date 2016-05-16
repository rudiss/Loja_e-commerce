<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*******************************************************************************
* Controller de cadastros de usuários.
*******************************************************************************/
class Cadastro extends CI_Controller {
    
	private $categorias;
    
	public function __construct(){
        parent::__construct();
        $this->load->model('categorias_model', 'modelcategorias');
        $this->categorias = $this->modelcategorias->listar_categorias();
    }
    
    public function index(){     
        $data_header['categorias'] = $this->categorias;        
    	$this->load->view('html-header');
        $this->load->view('header',$data_header);
    	$this->load->view('novo_cadastro');
        $this->load->view('footer');
        $this->load->view('html-footer');
    }
    
    public function adicionar(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Nome','required|min_length[5]');
        $this->form_validation->set_rules('cpf', 'CPF', 'required|min_length[14]');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[clientes.email]');
        if ($this->form_validation->run() == FALSE){
            $this->index();
        }
        else{
            $dados['nome'] = $this->input->post('nome'); 
            $dados['sobrenome'] = $this->input->post('sobrenome');
            $dados['rg'] = $this->input->post('rg');
            $dados['cpf'] = $this->input->post('cpf');
            $dados['data_nascimento'] = dataBr_to_dataMySQL($this->input->post('data_nascimento'));
            $dados['sexo'] = $this->input->post('sexo');
            $dados['cep'] = $this->input->post('cep');
            $dados['rua'] = $this->input->post('rua');
            $dados['bairro'] = $this->input->post('bairro');
            $dados['cidade'] = $this->input->post('cidade');
            $dados['estado'] = $this->input->post('estado');
            $dados['numero'] = $this->input->post('numero');
            $dados['telefone'] = $this->input->post('telefone');
            $dados['celular'] = $this->input->post('celular');
            $dados['email'] = $this->input->post('email');
            $dados['senha'] = $this->input->post('senha');        
            if($this->db->insert('clientes',$dados)){
                $this->enviar_email_confirmacao($dados);
            }
            else{
                echo "Houve um erro ao processar seu cadastro";
            }
        }
    }

    public function enviar_email_confirmacao($dados){               
        $mensagem = $this->load->view('emails/confirmar_cadastro.php',$dados,TRUE);
        $this->load->library('email');
        $this->email->from("loja@FoxGames","Fox Games.");
        $this->email->to($dados['email']);
        $this->email->subject('Fox Games - Confirmação de cadastro');
        $this->email->message($mensagem);            
        if($this->email->send()){
            $data_header['categorias'] = $this->categorias;        
            $this->load->view('html-header');
            $this->load->view('header',$data_header);
            $this->load->view('cadastro_enviado');
            $this->load->view('footer');
            $this->load->view('html-footer');
        }
        else{
            print_r($this->email->print_debugger());
        }
    }

    public function confirmar($hashEmail){
        $dados['status'] = 1;    
        $this->db->where('md5(email)',$hashEmail);
        if($this->db->update('clientes',$dados)){
            $data_header['categorias'] = $this->categorias;
            $this->load->view('html-header');
            $this->load->view('header',$data_header);
            $this->load->view('cadastro_liberado');
            $this->load->view('footer');
            $this->load->view('html-footer');
        }
        else{
            echo "Houve um erro ao confirmar seu cadastro";
        }
    }
    
    public function form_login(){
        $data_header['categorias'] = $this->categorias;
        $this->load->view('html-header');
        $this->load->view('header',$data_header);
        $this->load->view('login');
        $this->load->view('footer');
        $this->load->view('html-footer');
    }
    
    public function login(){
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('senha', 'Senha','required|min_length[5]');
        if ($this->form_validation->run() == FALSE){
            $this->form_login();
        }
        else{
            $this->db->where('email', $this->input->post('email'));
            $this->db->where('senha', $this->input->post('senha'));
            $this->db->where('status',1);
            $cliente = $this->db->get('clientes')->result();
            //echo $this->db->last_query(); //Use a função $this->db->last_query() para verificar a última consulta executada.
            //print_r($cliente);
            //exit();      
            if(count($cliente)==1){
                $dadosSessao['cliente'] = $cliente[0];
                $dadosSessao['logado'] = TRUE;
                $this->session->set_userdata($dadosSessao);
                redirect(base_url("produtos"));
            }
            else{
                $dadosSessao['cliente'] = NULL;
                $dadosSessao['logado'] = FALSE;
                $this->session->set_userdata($dadosSessao);
                redirect(base_url("login"));
            }
        }
    }   
    
    public function logout(){
        $dadosSessao['cliente'] = NULL;
        $dadosSessao['logado'] = FALSE;
        $this->session->set_userdata($dadosSessao);
        redirect(base_url("login"));
    }
    
    public function esqueci_minha_senha(){
        $data_header['categorias'] = $this->categorias;
        $this->load->view('html-header');
        $this->load->view('header',$data_header);
        $this->load->view('form_recupera_login');
        $this->load->view('footer');
        $this->load->view('html-footer');
    }
    
    public function recuperar_login(){
        $this->load->library('form_validation');        
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('cpf', 'Senha','required|min_length[5]');
        if ($this->form_validation->run() == FALSE){
            $this->esqueci_minha_senha();
        }
        else{
            $this->db->where('email', $this->input->post('email'));
            $this->db->where('cpf', $this->input->post('cpf'));
            $this->db->where('status',1);
            $cliente = $this->db->get('clientes')->result();
            if(count($cliente)==1){
                $dados = $cliente[0];    
                $mensagem = $this->load->view('emails/recuperar_senha.php',$dados,TRUE);
                $this->load->library('email');
                $this->email->from("loja@FoxGames","Fox Games");
                $this->email->to($dados->email);
                $this->email->subject('Fox Games - Recuperação de cadastro');
                $this->email->message($mensagem);            
                if($this->email->send()){
                    $data_header['categorias'] = $this->categorias;        
                    $this->load->view('html-header');
                    $this->load->view('header',$data_header);
                    $this->load->view('senha_enviada');
                    $this->load->view('footer');
                    $this->load->view('html-footer');
                }
                else{
                    print_r($this->email->print_debugger());
                }
            }
            else{
                redirect(base_url("esqueci-minha-senha"));
            }
        }
    }

    public function alterar_cadastro($id){
        if(null != $this->session->userdata('logado')){
            $this->db->where('md5(id)', $id);
            $this->db->where('id', $this->session->userdata('cliente')->id);
            $this->db->where('status',1);
            $data_body['cliente'] = $this->db->get('clientes')->result();
            if(count($data_body['cliente'])==1){
                $data_header['categorias'] = $this->categorias;        
                $this->load->view('html-header');
                $this->load->view('header',$data_header);
                $this->load->view('alterar_cadastro',$data_body);
                $this->load->view('footer');
                $this->load->view('html-footer');
            }
            else{
                redirect(base_url("login"));
            }
        }
        else{
            redirect(base_url("login"));
        }
    }    
    
	function salvar_alteracao_cadastro(){
		if(null != $this->session->userdata('logado')){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('nome', 'Nome','required|min_length[5]');
			$this->form_validation->set_rules('cpf', 'CPF', 'required|min_length[14]');
			$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
			if ($this->form_validation->run() == FALSE){
				$this->alterar_cadastro($this->input->post('id'));
			}
			else{
				$dados['nome'] = $this->input->post('nome'); 
				$dados['sobrenome'] = $this->input->post('sobrenome');
				$dados['rg'] = $this->input->post('rg');
				$dados['cpf'] = $this->input->post('cpf');
				$dados['data_nascimento'] = dataBr_to_dataMySQL($this->input->post('data_nascimento'));
				$dados['sexo'] = $this->input->post('sexo');
				$dados['cep'] = $this->input->post('cep');
				$dados['rua'] = $this->input->post('rua');
				$dados['bairro'] = $this->input->post('bairro');
				$dados['cidade'] = $this->input->post('cidade');
				$dados['estado'] = $this->input->post('estado');
				$dados['numero'] = $this->input->post('numero');
				$dados['telefone'] = $this->input->post('telefone');
				$dados['celular'] = $this->input->post('celular');
				$dados['email'] = $this->input->post('email');
				$dados['senha'] = $this->input->post('senha');
				$dados['status'] = 0;            
				$this->db->query("INSERT INTO clientes_log SELECT * FROM clientes WHERE md5(id) = '".$this->input->post('id')."'");
				$this->db->where('md5(id)',$this->input->post('id'));
				if($this->db->update('clientes',$dados)){
					$this->enviar_email_confirmacao($dados);
				}
				else{
					echo "Houve um erro ao processar seu cadastro";
				}
			}
		}
		else{
			redirect(base_url('login'));            
		}
	}
	
	public function meus_pedidos(){
		if(null != $this->session->userdata('logado')){
			$this->load->helper('text');
			$this->load->library('table');
			$this->db->where('cliente',$this->session->userdata('cliente')->id);
			$this->db->order_by('id','desc');
			$pedidos = $this->db->get('pedidos')->result();
			$data['pedidos'] = array();		
			foreach($pedidos as $pedido){			
				$data['pedidos'][$pedido->id]['pedido'] = $pedido;			
				$this->db->select('itens_pedidos.*, produtos.titulo, produtos.descricao');
				$this->db->from('itens_pedidos');
				$this->db->join('produtos', 'itens_pedidos.item = produtos.codigo');
				$this->db->where('itens_pedidos.pedido',$pedido->id);
				$data['pedidos'][$pedido->id]['itens'] = $this->db->get()->result();
			}			
			$data_header['categorias'] = $this->categorias;        
			$this->load->view('html-header');
			$this->load->view('header',$data_header);
			$this->load->view('meus_pedidos',$data);
			$this->load->view('footer');
			$this->load->view('html-footer');
		}
		else{
			redirect(base_url('login'));
		}
	}
}