<?php

/* description: process the request and idintyfies the controller, action, and URL Parameters
 * 
*/
function processReq() {
	
	global $url;
	
	$arrUrl = array();
	$arrUrl = explode("/",$url);

	// array_shift twice and prepair the remainder as url Params.
	$controller = $arrUrl[0];
	array_shift($urlArray);
	$action     = $urlArray[1];
	array_shift($urlArray);
	$urlParams  = $arrUrl;
	
	$controller = ucwords($controller);
	$controller.= 'Controller';
	$model      = rtrim($controller, 's');
	$dispatch   = new $controller($model,$controllerName,$action);

	if ((int)method_exists($controller, $action)) {
        	call_user_func_array(array($dispatch,$action),$queryString);
    	} else {
        	throw new Exception('Can not initiate the request'); 
    	}
}
