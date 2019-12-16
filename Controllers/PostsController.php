<?php

class PostsController extends Controller
{

    private $args;
    private $model;

    public function __construct($token)
    {
        return $this->model = new PostsModel($token);
    }

    /**
     * GET FUNCTIONS
     */

    public function index()
    {
        $data = $this->model->getAllUsers();
        if(count($data) > 0){
            $this->returnData(200, $data);
        }
        else{
            Controller::sendError(204);
        }
    }

    public function id()
    {
        $this->args = func_get_args()[0][0];
        $data = $this->model->getUsersByCriterion("id", $this->args);
        if(count($data) > 0){
            $this->returnData(200, $data);
        }
        else{
            Controller::sendError(204);
        }
    }

    public function first()
    {
        $this->args = func_get_args()[0][0];
        $data = $this->model->getUsersByCriterion("first", $this->args);
        if(count($data) > 0){
            $this->returnData(200, $data);
        }
        else{
            Controller::sendError(204);
        }
    }

    public function last()
    {
        $this->args = func_get_args()[0][0];
        $data = $this->model->getUsersByCriterion("last", $this->args);
        if(count($data) > 0){
            $this->returnData(200, $data);
        }
        else{
            Controller::sendError(204);
        }
    }

    public function age()
    {
        $this->args = func_get_args()[0][0];
        $data = $this->model->getUsersByCriterion("age", $this->args);
        if(count($data) > 0){
            $this->returnData(200, $data);
        }
        else{
            Controller::sendError(204);
        }
    }
}