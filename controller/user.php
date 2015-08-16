<?php

class User extends Controller {

	function __construct() {
		parent::__construct();
	} 

	public function login() {
		$this->view->render('user/login');
	}

	public function logout() {
		Session::init();
		Session::destroy();
		$this->view->render('/user/login');
	}

	public function auth() {
		$this->model->auth();
	}

	public function profile() {
		$this->view->render('user/profile');
	}

	public function dashboard() {
		Session::init();
		$isLogged = Session::get('isLogged');
		if($isLogged === false){
			Session::destroy();
			$this->view->render('error/noAccess');
			exit;
		}else{
			$this->view->render('user/dashboard');
		}
		
	}

} 

