<?php

class Error extends Controller {

	function __construct() {
		parent::__construct();
		$this->view->msg = 'The error page : (';
		$this->view->render('error/error');
	} 
} 

