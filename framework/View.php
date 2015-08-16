<?php 

class View {
	
	function __construct() {
	}

	public function render($name) {
		require 'view/include/header.php';
		require 'view/'.$name.'.php';
		require 'view/include/footer.php';
	}
}