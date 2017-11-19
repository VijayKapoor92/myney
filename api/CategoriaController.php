<?php

/**
 * Created by PhpStorm.
 * User: Vijay Kapoor
 * Date: 12/06/2017
 * Time: 15:37
 */

class CategoriaController{

    public function GETAction($request){
        header("Content-Type: application/json; charset=utf-8");
        if(isset($request->url_elements[2]) && $request->url_elements[2] === ""){
            return CategoriaDAO::findAll();
        }
    }

//    public function POSTAction($request){
//        header("Content-Type: application/json; charset=utf-8");
//        TODO: APRENDER A FAZER PROCEDURES
//        if(isset($request->url_elements[2]) && is_string($request->url_elements[2])){
//            return CategoriaDAO::adicionar(
//                $request->parameters["id_restaurante"],
//                $request->parameters["nm_categoria"],
//                $request->parameters["nm_produto"],
//                $request->parameters["vl_produto"],
//                $request->parameters["nm_descricao_produto"],
//                $request->parameters["qt_produto"]
//            );
//        }
//    }
//
//    public function DELETEAction($request){
//        header("Content-Type: application/json; charset=utf-8");
//        if(isset($request->url_elements[2]) && is_numeric($request->url_elements[2])){
//            return CategoriaDAO::deletar($request->url_elements[2]);
//        }
//    }
}