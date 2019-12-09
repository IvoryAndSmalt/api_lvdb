<?php

class NotFoundController extends Controller
{

    public function displayErrorMessage(String $file, Bool $isMethod)
    {
        if($isMethod){
            echo "404 : Method not found. You requested: " . $file;
        }
        else{
            echo "404 : Controller not found. Your requested: " . $file;
        }
    }
}