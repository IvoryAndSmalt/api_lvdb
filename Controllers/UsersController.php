<?php

class UsersController extends Controller
{
    private $args;
    private $model;

    public function __construct(){
        return $this->model = new HomeModel();
    }

    public function index()
    {
        var_dump($this->model->getAllUsers());
    }

    public function delete()
    {
        $this->args = func_get_args();
        var_dump($this->args);
        echo "delete 1 user";
    }

}