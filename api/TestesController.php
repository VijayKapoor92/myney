<?php

/**
 * Created by PhpStorm.
 * User: Vijay
 * Date: 12/06/17
 * Time: 20:50
 */
class TestesController{

    public function GETAction($request){
        header("Content-Type: application/json; charset=utf-8");
//        if(isset($request->url_elements[2]) && is_string($request->url_elements[2])){
        return $request->parameters;
//        }
    }

    public function POSTAction($request){
        header("Content-Type: application/json; charset=utf-8");
        if(isset($request->url_elements[2]) && is_string($request->url_elements[2])){

        }
//        print "<pre>";
//        print_r($output);

    }

}