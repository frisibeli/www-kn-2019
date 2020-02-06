<?php

class DBConnection {
	public $host   = "db";
	public $db     = "task_management";
	public $user   = "root";
	public $pass   = "admin";
	public $conn   = null;
	
	private static $instance = null;
	
	function __construct() {
		$this->conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
	}
	
	static function get_instance() {
		if (!self::$instance) {
			self::$instance = new DBConnection();
		}
		
		return self::$instance;
	}
}