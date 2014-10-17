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
								array("nome" => 'Tipos de Projeto', 'icone' => 'glyphicon-asterisk', 'url' => "painel/tipoprojeto"),
							);
			$query = "select * from tipoProjeto order by id desc";
			$campos = array(
				array('texto', 'Tipo de Projeto', 'txtNome'),
				array('imagem', 'Imagem teste', 'upload')
			);
			$acoes = array(1,2,3);
			$data['lista'] = $this->Toolmodel->painelListar($campos, $query, $acoes, 'tipoProjeto');
			//$this->output->cache(5);
			$this->parser->parse('shared/index',$data);
		}
		
		//carregar view cadastrar
		function cadastrar(){
			$data['message'] = "";
			$data['itens'] = array(
								array("nome" => 'Tipos de Projeto', 'icone' => 'glyphicon-asterisk', 'url' => "painel/tipoprojeto"),
								array("nome" => 'Novo Tipo de Projeto', 'icone' => 'glyphicon-euro', 'url' => "painel/tipoprojeto/cadastrar"),
							);
			$data['base_url'] = base_url();
		    $data['contentPage'] = "painel/tipoProjeto/cadastrar";
		    $data['pageTitle'] = "Cadastrar Tipo de Projeto";
				$campos = array(
					array('text', 'Nome', 'txtNome', 'placeholder="Nome do Tipo de projeto" required', 'Comentario de teste'),
					array('file', 'Arquivo Teste', 'upload', 'required', ''),
				);
			$data['campos'] = $this->Toolmodel->painelCampos($campos, 'tipoProjeto', 'insert', '');
			
			$this->parser->parse('shared/index', $data);
		}
		
		//carregar view cadastrar com campos preenchidos para edi��o
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
			
			$caminho = "tipoprojeto";
			$proporcoes = array(
				'width' => 170,
				'height' => 200,
				'principal' => 'height'
			);
			$nomeArquivo = Helperpainel::fazerUpload($caminho, true, $proporcoes);
			$dadosInserir = array(
				'txtNome' => $this->input->post('txtNome'),
				'upload' => $nomeArquivo,
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
		
		//receber id do tipoProjeto e exclu�-lo do banco de dados e tamb�m o arquivo do servidor
		function delete($id){
			$this->Toolmodel->excluir('tipoProjeto', $id);
			redirect("tipoProjeto/index/");
		}
		
		function mudarFlag($id){
			$this->Toolmodel->changeFlag('tipoprojeto', $id);
			redirect("tipoProjeto/index/");			
		}
		
	}//end controller tipoProjeto