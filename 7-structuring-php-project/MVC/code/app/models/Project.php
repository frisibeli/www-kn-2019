<?php

require('framework/base_model.php');

class Project extends BaseModel {

	public $table_name = 'projects';
	public $fields = ['name', 'description', 'user_id'];
	
	public $name;
	public $description;
	public $user_id;

	function __construct($name="", $description="", $user_id=0){
		parent::__construct();
		$this->name = $name;
		$this->description = $description;
		$this->user_id = $user_id;
	}
}
