<?php
	class TipoProjeto extends CI_Controller {

		//carrega view index mostrando todos os tipoProjetos cadastrados
		function index(){
			$this->load->library('session');
			$mensagem = " hidden";
			if($this->session->flashdata('messageType') != null){
				$mensagem = $this->session->flashdata('messageType');
			}
			$data['message'] = '<div class="alert alert-'.$mensagem.'">'.$this->session->flashdata('messageText').'</div>';
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
			$acoes = array(1,2, 3, 4);
			$data['lista'] = $this->Toolmodel->painelListar($campos, $query, $acoes, 'tipoProjeto');
			//$this->output->cache(5);
			$this->parser->parse('shared/index',$data);
		}
		
		//carregar view cadastrar
		function cadastrar(){
			$data['message'] = "";
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
			$data['message'] = "";
			$data['itens'] = array(
								array("nome" => 'Cadastros'),
								array("nome" => 'Tipos de Projeto')
							);
			$data['base_url'] = base_url();
	    $data['contentPage'] = "painel/tipoProjeto/cadastrar";
	    $data['pageTitle'] = "Editar Tipo de Projeto";
			$campos = array(
				array('text', 'Nome', 'txtNome', 'placeholder="Nome do Tipo de projeto" required', 'Comentario de teste'),
			);
			$data['campos'] = $this->Toolmodel->painelCampos($campos, 'tipoProjeto', 'update', $id, 'tipoProjeto');
			$this->parser->parse('shared/index', $data);
			
			$b['tipoProjeto'] = $this->Toolmodel->find('tipoprojeto', $id);
			$this->parser->parse('painel/tipoProjeto/cadastrar',$b);
		}
		
		//receber dados via POST e cadastrar no banco
		function insert(){
			$dadosInserir = array(
				'txtNome' => $this->input->post('txtNome')
			);
			$this->Toolmodel->inserir('tipoProjeto', $dadosInserir);
			redirect("tipoProjeto/index");
		}
		
		//receber dados via POST e dar update no banco
		function update(){
			$dadosUpdate = array(
				'id' => $this->input->post('Id'),
				'txtNome' => $this->input->post('txtNome')
			);
			$this->Toolmodel->alterar('tipoProjeto', $dadosUpdate); 
			redirect("tipoProjeto/index");
		}	
		
		//receber id do tipoProjeto e excluí-lo do banco de dados e também o arquivo do servidor
		function delete($id){
			$this->Toolmodel->excluir('tipoProjeto', $id);
			redirect("tipoProjeto/index/");
		}
		
		function mudarFlag($id){
			$this->Toolmodel->changeFlag('tipoprojeto', $id);
			redirect("tipoProjeto/index/");			
		}
		
	}//end controller tipoProjeto