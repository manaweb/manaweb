<?php
	class ToolModel extends CI_Model {
		function __construct (){
			parent::__construct();
		}

		//retorna todos as entradas da tabela especificada
		function getAllEntries($table){
	        $query = $this->db->query('SELECT * FROM '.$table);
	        return $query->result();
	    }
		
	    //retorna somente algumas entradas da tabela especificada
	    //caso $limit não seja especificada serão retornados todas as entradas da tabela
	    function getSomeEntries($table, $limit=0){
	    	$limite = $limit == 0 ? "" : " LIMIT $limit";
	    	$query = $this->db->query('SELECT * FROM '.$table.$limite);
	        return $query->result();	
	    }
	    
	    //retorna apenas uma entrada da tabela especificada de acordo com o $id
	    function find($table, $id){
	    	$query = $this->db->query("SELECT * FROM $table WHERE id = ".$this->db->escape_str($id));
	    	return $query->result();
	    }
	    
	    //recebe um array com os dados a serem inseridos e insere na tabela especificada
		function inserir($tabela, $dados){
			$this->load->library('session');
			try {
				$this->db->set($dados);
				$insercao = $this->db->insert($tabela);
				$this->session->set_flashdata('messageType', 'success');
				$this->session->set_flashdata('messageText', 'Cadastrado realizado com sucesso');
			} catch (Exception $e) {
				$this->session->set_flashdata('messageType', 'error');
				$this->session->set_flashdata('messageText', "Erro: ".$e->getMessage());
			}
		}
		
		//recebe um array com os dados a serem atualizados no banco de acordo tabela especificada
		function alterar($dados, $tabela){
			$this->load->library('session');
			try {
				$this->db->where('id', $dados['id']);
				$this->db->update($tabela, $dados);
				$this->session->set_flashdata('messageType', 'success');
				$this->session->set_flashdata('messageText', "Alteração realizada com sucesso");
			} catch (Exception $e) {
				$this->session->set_flashdata('messageType', 'error');
				$this->session->set_flashdata('messageText', "Erro: ".$e->getMessage());
			}		
		}
		
		//recebe uma string com o nome da tabela e uma string com o id da entrada e exclui do banco
		function excluir($tabela, $id){
			$this->load->library('session');
			try {
				$this->db->where('id',$id);
				$this->db->delete($tabela);
				$this->session->set_flashdata('messageType', 'success');
				$this->session->set_flashdata('messageText', "Exclusão realizada com sucesso");
			} catch (Exception $e) {
				$this->session->set_flashdata('messageType', 'error');
				$this->session->set_flashdata('messageText', "Erro: ".$e->getMessage());
			}
		}
		
		//recebe um array com as configurações da miniatura a ser criada e cria a miniatura
		//ver documentação da classe de manipulação de imagens codeigniter 'http://ellislab.com/codeigniter/user-guide/libraries/image_lib.html'
		function criarThumb($configThumb){
			$this->image_lib->initialize($configUpload);
			$this->image_lib->resize();
		}
		
		
		//verifica no banco se existe um usuário com login e senha iguais aos informados
		function login($user, $password){
			$this->db->select('Id, txtLogin, txtSenha');
		    $this->db->from('PainelUsuario');
		    $this->db->where('txtlogin', $this->db->escape_str($user));
		    $this->db->where('txtSenha', $this->db->escape_str(MD5($password)));
		    $this->db->where('boolstatus', TRUE);
		    $this->db->limit(1);
		    $query = $this->db->get();
		    if($query -> num_rows() == 1){
		      	return $query->result();
		    }
		    else{
		    	$this->load->library('session');
		      	$this->session->set_flashdata('messageType', 'error');
				$this->session->set_flashdata('messageText', "Usuário ou senha incorretos");
				return false;
		    }
		}
		
		//verifica se o usuário está logado no sistema
		function verificaLogado(){
			if (empty($_SESSION['Admin']['login']))
				redirect('/painel/painel/login');
		}
		
		//envia emails
		function enviarEmail($dadosEmail){
			$this->email->from($dadosEmail['from']);
			$this->email->to($dadosEmail['to']); 
			
			$this->email->subject($dadosEmail['subject']);
			$this->email->message($dadosEmail['msg']);	
			
			return $this->email->send();
		}


	}
	
	
	//function by Wesley Ferreira dos Santos para inserir no banco, passando como parametros 
		//um array com os nomes dos campos no bd
		//uma string que é o nome da tabela
		//um array com os dados, na mesma sequencia do array de campos
		
	    /*function inserir($campos, $tabela, $dados){
	    	$sql = "insert into (";
	    	$num = 0;
	    	$data = "";
	    	$camp = "";
	    	for($i = 0; $i < count($campos); $i++){
	    		if($num != 0){
	    			$camp .= ", ";
	    			$data .= ", ";
	    		}
	    		$num++;
	    		$camp .= $campos[$i];	
	    		$data .= "'".$dados[$i]."'";
	    	}
	    	$sql .= $camp.") values (".$data.")";

	    	$query = $this->db->query($sql);
	    	return $query;
	    }*/
	    
		//function by Wesley Ferreira dos Santos
	    //cria uma string com os códigos html de um form e dos campos de acordo com os campos especificados
	    /*function gerarCampos($campos){
	    	$formulario = "<form method='post' action=''>";
	    	//for(){}
	    	$formulario .= "</form>";
	    	return $formulario;
	    }*/