<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id = null;
	private $_name = null;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}


	/**
	 * 
	 * Autentica o usuário conforme o banco de dados
	 * @return boolean
	 */
	public function auth()
	{		//Se for admin a autenticação eh difernte
			/*
			if($this->username == 'admin')
				return $this->authenticate();
			*/

			
			//Carrega atributos do usuário
	   		$user = new user();
	   		$user = $user->find('email = :email',array('email'=>$this->username));
	   					
		
		if($user === null) //Verifica se o username é válido
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($user->password !== md5($this->password)){ //Verifica se o pass é válido

			    $this->errorCode=self::ERROR_PASSWORD_INVALID;
	   			
	   			$this->_name = $user->name;
	   			$this->_id = $user->id_user;
			}
		else{
				//Login foi bem sucedido
	   			$this->errorCode=self::ERROR_NONE;
	   			   			
	   			//Atribui os atributos
	   			$this->_name = $user->name;
	   			$this->_id = $user->id_user;
	   			
		}

		return !$this->errorCode;
	}

	
	
	/**
	 * 
	 * Retorna o nome do usuário
	 * @return string $username
	 */
	
	public function getName(){
		return ($this->_name == null) ? $this->username : $this->_name;
	}
	
	/**
	 * 
	 * Retorna o nome do usuário
	 * @return string $id
	 */
	public function getId(){
		return ($this->_id != null) ? $this->_id : $this->username;	
	}
}