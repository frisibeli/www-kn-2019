<?php

require('framework/base_controller.php');
require('app/models/courses.php');

class HomeController extends BaseController {

	function index() {
		$this->render('home/index', []);
		/*
		if($this->isAuthorized()){
			$this->render('home/authorized', ['user' => $this->getUser()]);
		}else{
			$this->render('home/index', []);
		}*/
	}

}
