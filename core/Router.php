<?php

class Router
{

  // 1. constructor
  public function __construct()
  {
    //2. URL parser
    if (isset($_GET['url'])) {
      $tokens = explode('/', rtrim($_GET['url'], '/'));
      // 2.AA token : authorization
      $auth_token = array_shift($tokens);
      if (empty($tokens)) {
        $controller = new Controller();
        $controller->returnError(400, [
          "error_code" => 400,
          "error_text" => "Bad request"
        ]);
        die;
      };
      //2A. controller
      $controllerName = ucfirst(array_shift($tokens));
      if (file_exists('Controllers/' . $controllerName . 'Controller.php')) {
        $controllerClass = $controllerName . 'Controller';
        $controller = new $controllerClass($auth_token);
        //2B. token analysis for specified request
        if (!empty($tokens)) {
          $method = array_shift($tokens);
          if (method_exists($controller, $method)) {
            //2C. parameters
            $controller->$method($tokens);
          }
          //wrong method; call 404 with method name
          else {
            $controller = new Controller();
            $controller->returnError(400, [
              "error_code" => 400,
              "error_text" => "Bad request"
            ]);
            die;
          }
        }
        //tokens is empty (no method specified), method called: index()
        else {
          $controller->index();
        }
      }
      //controller not found; call 404 controller name.
      else {
        $requestedControllerName = $controllerName;
        $controllerClass = 'NotFoundController';
        $notfound = new $controllerClass;
        $notfound->displayErrorMessage($requestedControllerName, false);
      }
    }
    //no url has been passed, calling home controller
    else {
      $controllerClass = 'HomeController';
      $home = new $controllerClass();
      $home->index();
    }
  }
}
