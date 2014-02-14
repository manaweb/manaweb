<?php
	class TipoProjeto extends CI_Controller {

		//carrega view index mostrando todos os tipoProjetos cadastrados
		function index(){
			$this->load->library('session');
			$data['messageText'] = $this->session->flashdata('messageText');
			$data['messageType'] = $this->session->flashdata('messageType');
			$data['base_url'] = base_url();
		    $data['contentPage'] = "painel/tipoProjeto/index";
		    $data['pageTitle'] = "Tipos de Projeto";
		    $data['itens'] = array(
								array("nome" => 'Listagens'),
								array("nome" => 'Tipos de Projeto')
							);
			$query = "select * from tipoProjeto order by id desc";
			$campos = array(
				array('texto', 'Tipo de Projeto', 'txtNome'),
			);
			$acoes = array(1,2);
			$data['lista'] = $this->Toolmodel->painelListar($campos, $query, $acoes, 'tipoProjeto');
			$this->parser->parse('shared/index',$data);
		}
		
		//carregar view cadastrar
		function cadastrar(){
			$data['itens'] = array(
								array("nome" => 'Cadastros'),
								array("nome" => 'Tipos de Projeto')
							);
			$data['base_url'] = base_url();
		    $data['contentPage'] = "painel/tipoProjeto/cadastrar";
		    $data['pageTitle'] = "Cadastrar Tipo de Projeto";
			$campos = array(
				array('text', 'Nome', 'txtNome', 'placeholder="Nome do Tipo de projeto" required', 'Comentario de teste'),
			);
			$data['campos'] = $this->Toolmodel->painelCampos($campos, 'tipoProjeto', 'insert', '');
			$this->parser->parse('shared/index', $data);
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
		
	}//end controller tipoProjeto