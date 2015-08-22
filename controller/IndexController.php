<?php

class IndexController extends Controller {

	function __construct() {
		parent::__construct();	
	} 

	function index() {
		$this->view->value = 'The version number: 1';
		$this->view->render('index');
	}
} 

