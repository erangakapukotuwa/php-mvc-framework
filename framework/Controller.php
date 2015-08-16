<?php 

class Controller {
	
	function __construct() {
		$this->view = new View();
	}

	public function loadModel($name) {
		$modelFile = 'model/'.$name.'Model.php';
		if(file_exists($modelFile)){
			require $modelFile;
			$strModelName =  $name.'Model';
			$this->model = new $strModelName();
		}
	}
}