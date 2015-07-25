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

    public function createTables()
    {
        $this->conn->exec("CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT, 
            password TEXT)");
        $this->conn->exec("CREATE TABLE IF NOT EXISTS data (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            content TEXT)");
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
        $sql = "SELECT id, username, password FROM data";
        $stmt = $this->conn->prepare($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Data
     */
    public function addData($content)
    {
        $sql = "INSERT INTO users (content) VALUES (:content)";
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
        $sql = "SELECT content FROM data";
        $stmt = $this->conn->prepare($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}