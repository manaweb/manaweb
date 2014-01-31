<?php
	class TipoProjeto extends CI_Controller {

		//carrega view index mostrando todos os tipoProjetos cadastrados
		function index(){
			$this->load->library('session');
			$data['tipoProjetos'] = $this->Toolmodel->getAllEntries('tipoProjeto');
			$data['messageText'] = $this->session->flashdata('messageText');
			$data['messageType'] = $this->session->flashdata('messageType');
			$this->parser->parse('tipoProjeto/index',$data); 
		}
		
		//carregar view cadastrar
		function cadastrar(){
			$this->load->view('painel/tipoProjeto/cadastrar');
		}
		
		//carregar view cadastrar com campos preenchidos para edição
		function editar($id){
			$b['tipoProjeto'] = $this->Toolmodel->find('tipoProjeto', $id);
			$this->parser->parse('painel/tipoProjeto/cadastrar',$b);
		}
		
		//receber dados via POST e cadastrar no banco
		function insert(){
			$dadosInserir = array(
				'txtNome' => $this->post->input('txtNome')
			);
			$this->Toolmodel->inserir($dadosInserir, 'tipoProjeto');
			
			redirect("tipoProjeto/index");
		}
		
		//receber dados via POST e dar update no banco
		function update(){
			$dadosUpdate = array(
				'id' => $this->post->input('Id'),
				'txtNome' => $this->post->input('txtNome')
			);
			$this->Toolmodel->alterar($dadosUpdate, 'tipoProjeto'); 
			redirect("tipoProjeto/index");
		}	
		
		//receber id do tipoProjeto e excluí-lo do banco de dados e também o arquivo do servidor
		function delete($id){
			$this->Toolmodel->excluir('tipoProjeto', $id);
			redirect("tipoProjeto/index/");
		}
		
	}//end controller Banner