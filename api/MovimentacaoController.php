<?php
ini_set("display_errors","on");
date_default_timezone_set("America/Sao_Paulo");

class MovimentacaoController {

    public function GETAction($request){
        header("Content-Type: application/json; charset=utf-8");
        if(isset($request->url_elements[2]) && is_numeric($request->url_elements[2])){
            return MovimentacaoDAO::findByMonth($request->url_elements[2]);
        }
    }

    public function POSTAction($request){
        header("Content-Type: application/json; charset=utf-8");
        if(isset($request->url_elements[2]) && is_string($request->url_elements[2])){
            $movimentacao = new Movimentacao(
                $_POST["tp_movimentacao"],
                $_POST["id_categoria"],
                $_POST["tp_pagamento"],
                $_POST["nm_movimentacao"],
                $_POST["vl_movimentacao"],
                $_POST["dt_movimentacao"]
            );
            return MovimentacaoDAO::adicionar($movimentacao);
        }
    }
//
//    public function DELETEAction($request){
//        header("Content-Type: application/json; charset=utf-8");
//        if(isset($request->url_elements[2]) && is_numeric($request->url_elements[2])){
//            return MovimentacaoDAO::deletar($request->url_elements[2]);
//        }
//    }

}
?>