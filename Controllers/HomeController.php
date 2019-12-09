<?php

class HomeController extends Controller
{

    private $name = "Home";

    public function getCtName(){
        return $this->name;
    }

    public function index()
    {
        echo "Hello from Home controller";
    }
}
