<?php

class Index extends Controller {

	function __construct() {
		parent::__construct();
		$this->view->value = 'The version number: 1';
		$this->view->render('index');
	} 

	function other($para = false) {
		echo "We are in other";
		echo "The value is: ". $para;
	}

} 

