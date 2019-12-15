<?php

class Env {

    private static $filename = "./core/env.json";

    private static function getEnv(){
        return json_decode(file_get_contents(self::$filename));
    }
    public static function getHost(){
        return self::getEnv()->host;
    }
    public static function getDb(){
        return self::getEnv()->dbname . ";" . self::getEnv()->charset;
    }
    public static function getUser(){
        return self::getEnv()->user;
    }
    public static function getPass(){
        return self::getEnv()->pass;
    }
}