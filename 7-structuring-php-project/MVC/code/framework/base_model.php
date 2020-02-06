<?php

require('framework/db_connection.php');

class BaseModel {
	function __construct() {
		$this->conn = DBConnection::get_instance()->conn;
	}
	
	function get_all() {
		$sql     = "SELECT * FROM {$this->table_name}";
		$query   = $this->conn->query($sql) or die("query failed!");
		$result = array();
		while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
			$result[] = $row;
		}
		return $result;
	}
	
	function get($id) {
		$sql = "SELECT * FROM {$this->table_name} where id = $id";
		$query = $this->conn->query($sql) or die("query failed!");
		return $query->fetch(PDO::FETCH_ASSOC);
	}

	function find($params){
		$sql = "SELECT * FROM {$this->table_name} WHERE ";
		foreach ($params as $key => $value) {
			$sql .= "$key = :$key";
		}
		$query = $this->conn->prepare($sql);
		
		foreach ($params as $key => $field) {
			$query->bindParam(":$key", $field);		
		}
		$query->execute();
		return $query->fetchAll();
	}

	function save(){
		$fields = implode(',', $this->fields);
		$placeholders = [];
		foreach ($this->fields as $key => $field) {
			array_push($placeholders, ':'.$field);	
		}

		$placeholders = implode(',', $placeholders);
		$sql = "INSERT INTO {$this->table_name} ({$fields}) VALUES ({$placeholders})";
		$query = $this->conn->prepare($sql);
		
		foreach ($this->fields as $key => $field) {
			$query->bindParam(":$field", $this->$field);		
		}
		$query->execute();
	}
}
