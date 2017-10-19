<?php
class User extends Model{
	
	function getUser($uID){
		
		$sql =  'SELECT * FROM users WHERE uID = ?;';
		
		// perform query
		$results = $this->db->getrow($sql, array($uID));
		
		$user = $results;
	
		return $user;
	
	}
		
	public function getAllUsers($limit = 0){
		
		$numposts = '';
		if($limit > 0){
			
			$numposts = ' LIMIT '.$limit;
		}
		
		$sql =  'SELECT * FROM users'.$numposts.';';
		
		// perform query
		$results = $this->db->execute($sql);
		
		while ($row=$results->fetchrow()) {
			$users[] = $row;
		}

		return $users;
	
	}
	
	public function addUser($data){
		
		$sql='INSERT INTO users (first_name,last_name,email,password) VALUES (?,?,?,?)'; 
		$this->db->execute($sql,$data);
		$message = 'User added.';
		return $message;
		
	}
	
	public function do_login($credentials) {
		
		$sql='SELECT * FROM users WHERE email = ? AND password = ?';
		
		$result = $this->db->execute($sql, $credentials);

		$message = 'Login Unsuccessful - Incorrect Username or Password';

		if ($result->_numOfRows > 0) {
			$message = 'Login Successful! Welcome '.$result->fields['first_name'].' '.$result->fields['last_name'].'!';
		}

		return $message;
		
	}
	
}
