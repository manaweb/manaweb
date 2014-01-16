<?php 
	class TipoProjeto extends CI_Controller {	 
		
		function index() { 
			$this->load->model('Tool','', TRUE);
			$data = $this->Tool->getAll('tipoProjeto');
			$this->load->view('painel/tipoProjeto/index',$data); 
		}
		
		function inserir(){
			$campos = array('txtNome');
			$dados = array('asdfgh');
			$this->Tool->inserir($campos,'tipoProjeto',$dados);
		} 
	} 