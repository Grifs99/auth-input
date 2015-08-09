<?php

class Database
{
    private $conn;

    public function __construct(){
        // Create (connect to) SQLite database in file
        $this->conn = new PDO('sqlite:src/db.sqlite3');

        //Development only - shows SQL errors / warnings
        $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    }

    /**
    * Creates tables for database
    */
    public function createTables()
    {
        $this->conn->exec("CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT, 
            password TEXT)");
        $this->conn->exec("CREATE TABLE IF NOT EXISTS data (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            content TEXT)");
        $this->conn->exec("CREATE TABLE IF NOT EXISTS sessions (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            session TEXT, 
            username TEXT)");
    }

    /**
    * Users
    */
    public function addUser($username, $password)
    {
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function removeUser($id)
    {
        $sql = "DELETE FROM users WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function getUser()
    {
        $data = array();
        $sql = "SELECT id, username, password FROM users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    /**
    * Data
    */
    public function addData($content)
    {
        $sql = "INSERT INTO data (content) VALUES (:content)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        $stmt->execute();

    }
    public function updateData($id, $content)
    {
        $sql = "UPDATE data SET content=:content WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function removeData($id)
    {
        $sql = "DELETE FROM data WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function getData()
    {
        $data = array();
        $sql = "SELECT id, content FROM data";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    /**
    * Sessions
    */
    public function addSession($username, $session)
    {
        $sql = "INSERT INTO sessions (session, username) VALUES (:session, :username)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':session', $session, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function removeSession($session)
    {
        $sql = "DELETE FROM sessions WHERE session=:session";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':session', $session, PDO::PARAM_STR);
        $stmt->execute();
    }
    public function getUserSession($session)
    {
        $sql = "SELECT username FROM sessions WHERE sessions=:session";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':session', $session, PDO::PARAM_STR);
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $user['username'];
    }
}