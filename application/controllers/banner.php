<?php
	class Banner extends CI_Controller {

		function index(){
			$this->load->model('ToolModel','',TRUE);
			$this->load->model('BannerModel','',TRUE);
			$data['banners'] = $this->ToolModel->getAllEntries('banner');
			$this->load->view('painel/banner/index',$data); 
		}
		
		//carregar view cadastrar
		function cadastrar(){
			$this->load->view('painel/banner/cadastrar');
		}
		
		//carregar view cadastrar
		function cadastrar2(){
			$this->load->view('painel/banner/cadastrar');
		}
		
		//carregar view editar
		function editar($id){
			$this->load->model('ToolModel','',TRUE);
			$this->load->model('BannerModel','',TRUE);
			$b['banner'] = $this->ToolModel->find('banner', $id);
			$this->load->view('painel/banner/editar',$b);
		}
		
		//POST
		function cadastrarBanco($post){
			$this->load->model('ToolModel','', TRUE);
			$this->Tool->inserir($post, 'banner');
		}
		
		function setDest($txtDest){
			$this->load->model('BannerModel','',TRUE);
			$this->BannerModel->txtDest = $txtDest;
		}
		
		function setData($post){
			$this->load->model('BannerModel','',TRUE);
			$bn->Dest = $post['txtDest'];
			$bn->txtTitu = $post['txtTitu'];
			$bn->txtImag = $post['txtImag'];
			return $bn;
		}
		
			
	}
	
