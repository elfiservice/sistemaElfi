<?php

//include '../classes/dao/UsuarioDAO.class.php';

class Usuario{
	
	private $id;
	private $login;
	private $senha;
	private $cpf;
	private $tipo;
	private $ultima_data_logado;
	private $email_ativado;
	private $email;
	


	public function Usuario($id, $login, $senha, $cpf, $tipo, $ultimaDataLog, $emailAtivado, $email){
	
		$this->id = $id;
		$this->login = 	$login;
		$this->senha = $senha;
		$this->cpf = $cpf;
		$this->tipo = $tipo;
		$this->ultima_data_logado =  $ultimaDataLog;
		$this->email = $email;
		$this->email_ativado = $emailAtivado;
		
		
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($pId){
		return $this->id = $pId;
	}
	
	public function getLogin(){
		return $this->login;
	}
	
	public function setLogin($pLogin){
		return $this->login = $pLogin;
	}
	
	public function getSenha(){
		return $this->senha;
	}
	
	public function setSenha($pSenha){
		return $this->senha = $pSenha;
	}
	
	public function getCpf(){
		return $this->cpf;
	}
	
	public function setCpf($pCpf){
		return $this->cpf = $pCpf;
	}
	
	public function getTipo(){
		return $this->tipo;
	}
	
	public function setTipo($pTipo){
		return $this->tipo = $pTipo;
	}
	
	public function getUltDataLogado(){
		return $this->ultima_data_logado;
	}
	
	public function setUltDataLogado($pUltDataLogado){
		return $this->ultima_data_logado = $pUltDataLogado;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function setEmail($pEmail){
		return $this->email = $pEmail;
	}
	
	public function getEmailAtivado(){
		return $this->email_ativado;
	}
	
	public function setEmailAtivado($pEmailAtivado){
		return $this->email_ativado = $pEmailAtivado;
	}	
	
	
	
}

?>