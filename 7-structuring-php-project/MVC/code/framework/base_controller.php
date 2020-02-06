<?php

class BaseController {

	function isAuthorized(){
		if($_SESSION['user']){
			return true;
		}
	}

	function getUser(){
		return $_SESSION['user'];
	}

	function render($view, $params) {
		ob_start();
		require("app/views/$view.php");
		$content = ob_get_contents();
		ob_end_clean();
		if($this->isAuthorized()){
			require("app/views/layoutAuthorized.php");
		}else{
			require("app/views/layout.php");
		}
	}

	function redirect($path){
		header('Location: '.$path);
		return true;
	}
}
