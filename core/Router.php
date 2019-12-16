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
        $controller->sendError(400);
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
            //2C. Call method with parameters
            $controller->$method($tokens);
          }
          //wrong method; call 405 method not allowed
          else {
            $controller = new Controller();
            $controller->sendError(405);
          }
        }
        //tokens is empty (no method specified), method called: index()
        else {
          if (method_exists($controller, "index")) {
            $controller->index();
          } else {
            $controller = new Controller();
            $controller->sendError(400);
          }
        }
      }
      //controller not found; call 404 controller name.
      else {
        $controller = new Controller();
        $controller->sendError(404);
      }
    }
    //no url has been passed, bad request
    else {
      $controller = new Controller();
      $controller->sendError(400);
    }
  }
}
