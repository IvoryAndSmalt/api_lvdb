<?php

class UsersModel extends Db {

    private $dbh;

    public function __construct(){
        $this->dbh = Db::connect();
    }

    public function getAllUsers(){
        $stmt = $this->dbh->query('SELECT * FROM users');
        return $stmt->fetchAll();
    }

}