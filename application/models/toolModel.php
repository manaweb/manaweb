<?php
	class ToolModel extends CI_Model {
		function __construct (){
			parent::__construct();
		}

		function getAllEntries($table)
	    {
	        $query = $this->db->query('SELECT * FROM '.$table);
	        return $query->result();
	    }

	    function getSomeEntries($table, $limit=0){
	    	$limite = $limit == 0 ? "" : " LIMIT $limit";
	    	$query = $this->db->query('SELECT * FROM '.$table.$limite);
	        return $query->result();	
	    }
	    
	    function find($table, $id){
	    	$query = $this->db->query("SELECT * FROM $table WHERE id = ".$this->db->escape_str($id));
	    	return $query->result();
	    }

	    function gerarCampos($campos){
	    	$retorno = "";
	    	return $retorno;
	    }

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
	    
		function inserir($tabela, $dados){
			
			$this->db->set($dados);
			$insercao = $this->db->insert($tabela);
			return $insercao;	
		}
		
		function alterar($dados, $tabela){
			$alteracao = $this->db->update($tabela, $dados);
			return $alteracao;
		}


	}
?>