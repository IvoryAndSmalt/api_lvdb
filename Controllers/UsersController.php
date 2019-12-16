<?php

class UsersController extends Controller
{

    private $args;
    private $model;

    public function __construct($token)
    {
        return $this->model = new UsersModel($token);
    }

    /**
     * GET FUNCTIONS
     */

    public function index()
    {
        $data = $this->model->getAllUsers();
        if (count($data) > 0) {
            $this->sendJson(200, $data);
        } else {
            $this->sendError(400);
        }
    }

    public function id()
    {
        $this->args = func_get_args()[0][0];
        $data = $this->model->getUsersByCriterion("id", $this->args);
        if (count($data) > 0 && $data !== false) {
            $this->sendJson(200, $data);
        } else {
            $this->sendError(400);
        }
    }

    public function first()
    {
        $this->args = func_get_args()[0][0];
        $data = $this->model->getUsersByCriterion("first", $this->args);
        if (count($data) > 0) {
            $this->sendJson(200, $data);
        } else {
            $this->sendError(400);
        }
    }

    public function last()
    {
        $this->args = func_get_args()[0][0];
        $data = $this->model->getUsersByCriterion("last", $this->args);
        if (count($data) > 0) {
            $this->sendJson(200, $data);
        } else {
            $this->sendError(400);
        }
    }

    public function age()
    {
        if (isset(func_get_args()[0][0])) {
            $this->args = $this->args = func_get_args()[0][0];
            $data = $this->model->getUsersByCriterion("age", $this->args);
            if (count($data) > 0) {
                $this->sendJson(200, $data);
            } else {
                $this->sendError(400);
            }
        } else {
            $this->sendError(400);
        }
    }
}
