<?php 

class CalculatorController extends Controller {
	
	function __construct() {
	}

	public function index() {
	}

	public function add($number1,$number2) {
		$answr = $number1+$number2;
		return $answr;
	}
}