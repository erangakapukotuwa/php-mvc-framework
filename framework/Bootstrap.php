<?php

class Bootstrap {

	function __construct() {


		$strUrl = isset($_GET['url']) ? $_GET['url'] : null;
		$strUrl = rtrim($strUrl,'/');
		$arrUrl = explode('/',$strUrl);
		$strControllerName = $arrUrl[0];

		if(empty($arrUrl[0])){
			require 'controller/index.php';
			$controller = new Index();
			$controller->index();
			return false;
		}

		$file = 'controller/'.$strControllerName.'.php';
		if(file_exists( $file)){
			require $file;
		}else{
			require 'controller/error.php';
			$controller = new Error();
			return false;
		}
		
		$controller = new $strControllerName;
		$controller->loadModel($arrUrl[0]);

		if(isset($arrUrl[2])){
			if(method_exists($controller,$arrUrl[1])) {
				$controller->{$arrUrl[1]}($arrUrl[2]);
			}else{
				require 'controller/error.php';
				$controller = new Error();
				return false;	
			}
		}else{
			if(isset($arrUrl[1])){
				if(method_exists($controller,$arrUrl[1])) {
					$controller->{$arrUrl[1]}();
				}else{
					require 'controller/error.php';
					$controller = new Error();
					return false;	
				}
			} else {
				$controller->index();	
			}
		}
	}
}