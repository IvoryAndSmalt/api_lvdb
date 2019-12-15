<?php

class UsersController extends Controller
{

    private $args;
    private $model;

    public function __construct($token)
    {
        return $this->model = new UsersModel($token);
    }
    
    public function index()
    {
        $data = $this->model->getAllUsers();
        $this->returnData(200, $data);
    }

}