<?php

class LoginController extends Controller{
	
	public $user;
	
	public function do_login() {
		
		$this->user = new User();			

		$data = array('email'=>$_POST['email'],'password'=>$_POST['password']);

		$result = $this->user->do_login($data);

		$this->set('message', $result);
		
	}
	
	
}