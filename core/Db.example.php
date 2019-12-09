<?php 

class Db {

    private static $host = 'hostname';
    private static $dbname = 'databasename;charset=utf8';
    private static $user = 'user';
    private static $pass = 'password';
    private static $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    /**
     * Name: connect()
     * Description: This function connects to database using static private properties of the same class.
     * @return PDO instance $dbh
     */
    protected static function connect(){

        try {
            $dbh = new PDO('mysql:host='.self::$host.';dbname='.self::$dbname,self::$user,self::$pass,self::$options);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $dbh;
    }

}