<?php
class Controller
{

  private function sendResponse($http_code, $data)
  {
    // header('Content-type: application/json', true, $http_code);
    $json = json_encode($data);
    echo $json;
  }

  public function returnError(Int $http_code, Array $data)
  {
    $this->sendResponse($http_code, $data);
  }

  protected function returnData(Int $http_code, Array $data)
  {
    $this->sendResponse($http_code, $data);
  }
}
