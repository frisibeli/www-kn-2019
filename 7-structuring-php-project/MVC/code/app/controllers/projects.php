<?php

require('framework/base_controller.php');
require('app/models/Project.php');

class ProjectsController extends BaseController {
	
	function all() {
		$model = new Project();
		$user = $this->getUser();
		$courses = $model->find(['user_id' => $user['id']]);
		$params = array('courses'=>$courses);
		$this->render('courses/all', $params);
	}
	
	function add() {
		$params = array();
		$this->render('courses/add', $params);
	}
	
	function view($param) {
		$courses_model = new Project();
		$course = $courses_model->get($param);
		$view_params = array('course'=>$course);
		$this->render('courses/view', $view_params);
	}

}
