<?php

/**
 * Class Auth
 * Handles user registration, login
 */
include('Database.php');
class Auth
{
    private $db;
    public function __construct(Database $db)
    {
    	$this->db = $db; 
    }
    public function login($username, $password)
    {
    	$user = $this->db->getUser($username, $password);
    	if (($username === $user['username']) && (verifyHash($password, $user['password']))) {
    		$this->addSession($username);
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
		$this->db->removeSession(session_id());
    	session_destroy();
		session_unset();
    }
    public function verifyHash($password)
    {
    	return password_verify($password,$passwordHash);
    }
    public function getSession()
    {
    	return session_id();
    }
}