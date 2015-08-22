<?php 

class Controller {
	
	function __construct() {
		$this->view = new View();
	}

	public function loadModel($name) {
		$modelFile = 'model/'.$name.'.php';
		if(file_exists($modelFile)){
			require $modelFile;
			$strModelName =  $name;
			$this->model = new $strModelName();
		}
	}
}