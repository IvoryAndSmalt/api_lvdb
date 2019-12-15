<?php

class HomeModel extends Db {

    private $conn;

    public function __construct(){
        $this->conn = Db::connect(true);
    }
}