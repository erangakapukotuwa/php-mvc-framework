<?php

class ErrorController extends Controller {

	function __construct() {
		parent::__construct();
		$this->view->msg = 'The error page : (';
		$this->view->render('error/error');
	}

} 

