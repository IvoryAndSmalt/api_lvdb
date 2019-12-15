<?php 

class Db {

    private static $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    protected static function connect($token){

        try {
            $dbh = new PDO('mysql:host='.Env::getHost().';dbname='.Env::getDb(),Env::getUser(),Env::getPass(),self::$options);
        } catch (PDOException $e) {
            echo $e->getMessage();
        };

        //gets all tokens and stores them in an array
        $tokens = $dbh->query('SELECT token from tokens;');
        $results = [];
        while($result = $tokens->fetch()['token']){
          array_push($results, $result);
        }
        
        //verify
        foreach ($results as $value) {
          if(!password_verify($token, $value)){
            continue;
          }
          else if(password_verify($token, $value)){
            return $dbh;
          }
          else{
            return false;
          }
        }
    }
}