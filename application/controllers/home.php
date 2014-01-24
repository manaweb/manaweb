<?php
	class Home extends CI_Controller {	 
		
		function index() { 
			//$data['banner'] = $this->ToolModel->getAllEntries('banner');
			$data['projeto'] = $this->ToolModel->getAllEntries('projeto');
			$data['tecnologia'] = $this->ToolModel->getAllEntries('tecnologia');
			$this->db->select('*');
		    $this->db->from('banner');
		    //$this->db->where('id', '5');
		    //$this->db->limit(1);
		    $data['banner'] = $this -> db -> get()->result();
			$this->parser->parse('/home/index',$data);
		}
		
		function enviarContato(){
			$dadosEmail = array(
				'to' => "suportemanaweb@hotmail.com",
				'from' => array($this->post->input('txtEmail'), $this->post->input('txtNome')),
				'subject' => 'Contato Site ManáWeb',
				'message' => $msg
			);
			return $this->ToolModel->enviarEmail($dadosEmail);
		}
	} 
