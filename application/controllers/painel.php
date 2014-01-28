<?php
	class Painel extends CI_Controller {	 
		
		//verifica se o usuário estiver logado e redireciona para a tela de login ou para a tela principal do painel
		function index() { 
			$this->ToolModel->verificaLogado();	
			$this->load->view('painel/index');
		}
		
		function login(){
			$this->ToolModel->verificaLogado();
			redirect('painel/index');
		}
		
		function logar(){
			$usuario = $this->post->input('txtLogin');
			$senha = $this->post->input('txtSenha');
			if(!$this->ToolModel->login($usuario, $senha))
				$this->load->view('/painel/index');	
			$this->redirect('painel/login');
 		}
	} 