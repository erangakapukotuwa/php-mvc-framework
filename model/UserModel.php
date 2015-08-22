<?php 

class UserModel extends Model {
	
	function __construct() {
		parent:: __construct();
	}

	public function auth() {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$data = $this->db->query("SELECT id FROM user WHERE 
						username ='$username' AND password= MD5('$password') ");

		$count = $data->rowcount();
		if($count > 0){
			Session::init();
			Session::set('isLogged',true);
			header('location: /user/dashboard');
		}else{
			Session::init();
			Session::set('isLogged',false);
			header('location: /user/login');
		}
	}
}