<?php

class UsersModel extends Db
{

  private $dbh;

  public function __construct($token)
  {
    if ($this->dbh = Db::connect($token)) {
    }
    else {
      $controller = new Controller();
      $controller->returnError(403, [
        "error_code" => 403,
        "error_text" => "Unauthorized: invalid token"
      ]);
      die;
    }
  }

  public function getAllUsers()
  {
    $stmt = $this->dbh->query('SELECT * FROM users');
    return $stmt->fetchAll();
  }

  public function getUsersByCriterion($criterion, $value)
  {
    var_dump($criterion, $value);
    // Filter criterion
    
    filter_var($criterion, FILTER_SANITIZE)
    $stmt = $this->dbh->prepare('SELECT * FROM users WHERE ? = ?;');
    $stmt->execute(["users.".$criterion, $value]);
    return $stmt->fetchAll();
  }
}
