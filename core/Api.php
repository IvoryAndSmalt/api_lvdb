<?php 

class Api {

    // static prps and methods for api
    public static function get(Object $model, String $function, $args = null){
        $data = $model->$function($args);
        $json = json_encode($data);
        if ($json === false) {
            $json = '{"jsonError":"unknown"}';
            http_response_code(401);
        }
        echo $json;
    }
}