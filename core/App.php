<?php 

class App {

    // 1. constructor
    public function __construct()
    {
        //2. URL parser
        if(isset($_GET['url'])){
            $tokens = explode('/', rtrim($_GET['url'], '/'));
            //2A. controller
            $controllerName = ucfirst(array_shift($tokens));
            if(file_exists('Controllers/'.$controllerName.'Controller.php')){
                $controllerClass = $controllerName . 'Controller';
                $controller = new $controllerClass;
                //2B. Method if tokens is not empty
                if(!empty($tokens)){
                    $method = array_shift($tokens);
                    if(method_exists($controller, $method)){
                        //2C. parameters
                        $controller->$method($tokens);
                    }
                    //wrong method; call 404 with method name
                    else{
                        $controllerClass = "NotFoundController";
                        $notfound = new $controllerClass();
                        $notfound->displayErrorMessage($method, true);
                    }
                }
                //tokens is empty (no method specified), method called: index()
                else{
                    $controller->index();
                }
            }
            //controller not found; call 404 controller name.
            else{
                $requestedControllerName = $controllerName;
                $controllerClass = 'NotFoundController';
                $notfound = new $controllerClass;
                $notfound->displayErrorMessage($requestedControllerName, false);
            }
        }
        //no url has been passed, calling home controller
        else{
            $controllerClass = 'HomeController';
            $home = new $controllerClass();
            $home->index();
        }
    }
}