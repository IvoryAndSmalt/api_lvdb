<?php

class PostsModel extends Db
{

  private $dbh;

  public function __construct($token)
  {
    if ($this->dbh = Db::connect($token)) { } else {
      $controller = new Controller();
      $controller->returnError(403, [
        "error_code" => 403,
        "error_text" => "Unauthorized: invalid token"
      ]);
      die;
    }
  }

  private function getColumnNames()
  {
    $columns = [];
    $stmt = $this->dbh->query('SELECT * FROM users LIMIT 1;');
    $result = $stmt->fetch();
    foreach ($result as $key => $value) {
      array_push($columns, $key);
    }
    return $columns;
  }

  public function getAllPosts()
  {
    $stmt = $this->dbh->query('SELECT * FROM users');
    return $stmt->fetchAll();
  }

  public function getUsersByCriterion($criterion, $value)
  {
    if (in_array($criterion, $this->getColumnNames())) {
      $stmt = $this->dbh->prepare('SELECT * FROM users WHERE ' . $criterion . ' = ?;');
      $stmt->execute([$value]);
      return $stmt->fetchAll();
    }
    else{
      Controller::sendError(400);
    }
  }
}