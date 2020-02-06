<?php

class WebApp {

	function process_request() {
		$query = $_GET['q'];
		$param = null;
		if ($query) {
			$query_arr = explode('/', $query);
			$controller = $query_arr[1];
			$action = $query_arr[2];
			$param = $query_arr[3];
		} else {
			$controller = 'home';
			$action = 'index';
		}


		$controller_file = "app/controllers/$controller.php";
		
		if (file_exists($controller_file)) {
			require($controller_file);
		} else {
			die('page not found');
		}
		
		$controller_name = ucfirst($controller)."Controller";
		
		$instance = new $controller_name();
		$instance->$action($param);
	}

}