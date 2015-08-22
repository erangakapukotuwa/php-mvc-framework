<?php

class Bootstrap {

	function __construct() {


		$strUrl = isset($_GET['url']) ? $_GET['url'] : null;
		$strUrl = rtrim($strUrl,'/');
		$arrUrl = explode('/',$strUrl);

		if(empty($arrUrl[0])){
			require 'controller/IndexController.php';
			$controller = new IndexController();
			$controller->index();
			return false;
		}

		$strCapitalized = $this->capitalize($arrUrl[0]);
		$strControllerName = $strCapitalized.'Controller';
		$strModelName = $strCapitalized.'Model';

		$file = 'controller/'.$strControllerName.'.php';
		if(file_exists( $file)){
			require $file;
		}else{
			require 'controller/ErrorController.php';
			$controller = new ErrorController();
			return false;
		}
		
		$controller = new $strControllerName;
		$controller->loadModel($strModelName);

		if(isset($arrUrl[2])){
			if(method_exists($controller,$arrUrl[1])) {
				$controller->{$arrUrl[1]}($arrUrl[2]);
			}else{
				require 'controller/ErrorController.php';
				$controller = new ErrorController();
				return false;	
			}
		}else{
			if(isset($arrUrl[1])){
				if(method_exists($controller,$arrUrl[1])) {
					$controller->{$arrUrl[1]}();
				}else{
					require 'controller/ErrorController.php';
					$controller = new ErrorController();
					return false;	
				}
			}
			/*} else {
				$controller->index();	
			}*/
		}
	}

	public function capitalize($str) {
		$arrSplitted = split('-',$str);
		$strCapitalize = '';
		foreach($arrSplitted as $strWord){

			$strCapitalize = $strCapitalize.ucwords($strWord);
		}
		return $strCapitalize;
	}
}