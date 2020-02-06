<?php

require('framework/base_model.php');

class QRCode extends BaseModel {

	public $table_name = 'qr_codes';
	
	function create($lecturer_id, $class_id){
		$sql = "INSERT INTO {$this->table_name} (lecturer_id, class_id) VALUES (:lecturer_id, :class_id)";
		$query = $this->conn->prepare($sql);
		$query->bindParam(":lecturer_id", $lecturer_id);		
		$query->bindParam(":class_id", $class_id);		
		$query->execute();
	}
}
