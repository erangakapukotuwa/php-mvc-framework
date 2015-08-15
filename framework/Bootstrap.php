<?php

class Bootstrap {

	function __construct() {

		$strUrl = rtrim($_GET['url'],'/');
		$arrUrl = explode('/',$strUrl);
		$strControllerName = $arrUrl[0];

		$file = 'controller/'.$strControllerName.'.php';
		if(file_exists( $file)){
			require $file;
		}else{
			require 'controller/error.php';
			$controller = new Error();
			return false;
		}
		
		$controller = new $strControllerName;

		if(isset($arrUrl[2])){
			$controller->{$arrUrl[1]}($arrUrl[2]);
		}else{
			if(isset($arrUrl[1])){
				$controller->{$arrUrl[1]}();
			}
		}
	}
}