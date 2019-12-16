<?php
class Controller
{

  protected function sendJson($http_code, $data)
  {
    header('Content-type: application/json', true, $http_code);
    $json = json_encode($data);
    echo $json;
  }

  public function sendError($code)
  {
    switch ($code) {
      case 400:
        $this->sendJson(400, [
          "error_code" => 400,
          "error_text" => "Bad Request"
        ]);
        break;
      case 403:
        $this->sendJson(403, [
          "error_code" => 403,
          "error_text" => "Unauthorized"
        ]);
        break;
      case 404:
        $this->sendJson(404, [
          "error_code" => 404,
          "error_text" => "Not Found"
        ]);
        break;
      case 405:
        $this->sendJson(405, [
          "error_code" => 405,
          "error_text" => "Method Not Allowed"
        ]);
        break;
    }
  }
}
