<?php

require('framework/base_controller.php');
require('app/models/user.php');

class UserController extends BaseController {
	
	function login() {
		$errors = [];
		if($_POST){
			$user = new User();
			$result = $user->find(['username' => $_POST['username']]);

			if(count($result)){
				$loggedUser = $result[0];
				if(password_verify($_POST['password'], $loggedUser['password'])){
					$this->createSession($loggedUser);
					$this->redirect('/');
				}else{
					array_push($errors, "Incorrect password");
					//handle error
				}
			}else{
				array_push($errors, "Incorrect username");
			}
		}
		$this->render('home/login', $errors);
	}

	function logout(){
		$_SESSION["user"] = false;
		$this->redirect('/');
	}

	function createSession($user){
		$_SESSION["user"] = $user;
	}

	function register() {
		if($_POST){
			$user = new User($_POST['username'], $_POST['password']);
			$user->save();
			$this->redirect('/');
		}
		$this->render('home/register', []);
	}

}
