<?php

require('framework/base_model.php');

class User extends BaseModel {

	public $table_name = 'users';
	public $fields = ['username', 'password'];
	
	public $username;
	public $password;

	function __construct($username="", $password=""){
		parent::__construct();
		$this->username = $username;
		$this->password = password_hash($password, PASSWORD_DEFAULT);
	}
}
