<?php

class HomeController extends Controller
{

    protected $name = "Home";

    public function index()
    {
        $this->render("home/index");
    }
}
