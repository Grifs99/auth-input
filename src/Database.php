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
        $this->conn->exec("CREATE TABLE IF NOT EXISTS users (username TEXT, password TEXT)");
        $this->conn->exec("CREATE TABLE IF NOT EXISTS data (content TEXT)");
    }

    /**
    * Users
    */
    public function addUser(){}
    public function removeUser(){}
    public function getUser(){}

    /**
     * Data
     */
    public function addData(){}
    public function updateData(){}
    public function removeData(){}
    public function getData(){}
}
