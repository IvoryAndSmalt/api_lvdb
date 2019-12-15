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

    public function id(){
      $this->args = func_get_args()[0][0];
      $data = $this->model->getUsersByCriterion("id", $this->args);
      $this->returnData(200,$data);
    }

}