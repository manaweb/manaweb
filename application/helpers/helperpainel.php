<?php
	class Helperpainel extends CI_Controller {
		
		//função para fazer upload
		//deve-se sempre existir na raiz do projeto a pasta assets/img
		//dentro dessa pasta img criar uma pasta com o nome do controller q for fazer o upload
		//dentro da pasta que possui o mesmo nome do controller deve haver uma pasta chamada thumb para serem criadas miniaturas
		//$caminho sera o nome da pasta que possui o nome do controller (somente o nome da pasta, sem '/' ou quaisquer outros caracteres
		//$thumb por padrão está definido como false para não ser criada miniatura, caso seja necessário a criação de miniatura é necessário passar este parâmetro como true
		//$proporcoes é um array com as dimensões que se deseja para a miniatura, e qual das proproções será tomado como base(width ou height) padrão: 150x150 base-padrão: width
		//ex: $proporcoes = array('width' => 1000, 'height' => 1000, 'principal' => 'width')
		//
		public static function fazerUpload($caminho, $thumb = FALSE, $proporcoes = array('width' => 150, 'height' => 150, 'principal' => 'width')){
			$this->load->library('image_lib');
			$config['upload_path'] = "assets/img/".$caminho;
			$config['allowed_types'] = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
			$dataImagem = array();
			if ( ! $this->upload->do_upload('upload'))
			{
				$error = array('error' => $this->upload->display_errors());
	
				$this->load->view('upload_form', $error);
			}
			else
			{
				$dataImagem['upload_data'] = $this->upload->data();
				if($thumb == true){
					$configUpload = array(
						'create_thumb' => TRUE,
						'width' => $proporcoes['width'],
						'height' => $proporcoes['height'],
						'source_image' => $dataImagem['upload_data']['full_path'],
						'new_image' => "assets/img/$caminho/thumb",
						'master_dim' => $proporcoes['principal'],
						'thumb_marker' => ""
					);
					$this->image_lib->initialize($configUpload);
					$this->image_lib->resize();
				}
			}
			return $dataImagem['upload_data']['file_name'];
		}
		
		//envia emails
		public static function enviarEmail($dadosEmail){
			$this->email->from($dadosEmail['from']);
			$this->email->to($dadosEmail['to']); 
			
			$this->email->subject($dadosEmail['subject']);
			$this->email->message($dadosEmail['msg']);	
			
			return $this->email->send();
		}
	}