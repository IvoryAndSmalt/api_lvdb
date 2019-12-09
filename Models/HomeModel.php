<?php

class HomeModel extends Db {

    private $conn;

    public function __construct(){
        $this->conn = Db::connect();
    }

    /**
     * Name: getAllUsers()
     * Description: returns all entries in the table "users"
     *
     * @return Bool/Array $stmt
     */
    public function getAllUsers(){
        $stmt = $this->conn->query('SELECT * FROM users');
        return $stmt->fetchAll();
    }

}