<?php

class UnitTestCase extends PHPUnit_Framework_TestCase {

    protected $class;

    public function __construct(){
    	$strCurrentChild   = get_called_class();
    	$strControllerName = str_replace('Test','',$strCurrentChild); 
    	$file              = 'controller/'.$strControllerName.'.php';
		
		if(file_exists( $file)){
			require $file;
			$this->class = new $strControllerName();
		}else{
			echo "\n";
			echo "*************** \n";
			echo "* ERROR !     * \n";
			echo "*************** \n";
			echo "The file, " . $file. " is not found. Please check your Test file name convention is correct. \n \n \n";
			$this->markTestIncomplete();
		}
    }
}
