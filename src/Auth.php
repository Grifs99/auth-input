<?php

/**
 * Class Auth
 * Handles user registration, login
 */
class Auth
{
    private $db;
    public function __construct(Database $db)
    {
    	$this->db = $db; 
    }
    public function login($username, $password)
    {
    	$user = $this->db->getUser($username);

    	if (($username === $user[0]['username']) && (password_verify($password, $user[0]['password']))) {
    		//$this->addSession($username);
    		session_regenerate_id();            
            $_SESSION['SESS_USERNAME'] = $user[0]['username'];  
            $_SESSION['SESS_ID'] = uniqid();            
            session_write_close();
            return true;
   		} else {
   			return false;
   		}
    }
    public function logout()
    {
    	$this->removeSession();
    }
    public function addUser($username, $password, $passwordRepeat)
    {
    	$user = $this->db->getUser($username, $password);
    	if (!($username === $user['username'])) {
    		if ($password === $passwordRepeat) {
    			$passHash = $this->getHash($password);
		    	$this->db->addUser($username, $passHash);
		    	return true;
    		} else {
    			return false;
    		}
    	} else {
    		return false;
    	}
    }
    public function getHash($password)
    {
    	return password_hash($password, PASSWORD_DEFAULT, ['cost'=>9]);
    }
    public function addSession($username)
    {
    	session_start();
    	$session = $this->getSession();
    	$this->db->addSession($username, $session);
    }
    public function removeSession()
    {
        session_destroy();
        session_unset();
		$this->db->removeSession(session_id());    	
    }
    public function verifyHash($password,$passwordHash)
    {
    	return password_verify($password,$passwordHash);
    }
    public function getSession()
    {
    	return session_id();
    }
}